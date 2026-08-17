<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\ParticipantSpendingService;
use App\Services\PrizeAllocator;
use Illuminate\Http\JsonResponse;
use App\Models\Participant;

class EventController extends Controller
{
    public function __construct(
        protected PrizeAllocator $prizeAllocator,
        protected ParticipantSpendingService $spendingService
    ) {
    }

    public function data(): JsonResponse
    {
        /*
        |--------------------------------------------------------------------------
        | EVENT AKTIF
        |--------------------------------------------------------------------------
        */

        $event = Event::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada event aktif.',
            ], 404);
        }


        /*
        |--------------------------------------------------------------------------
        | ALOKASI HADIAH
        |--------------------------------------------------------------------------
        |
        | PrizeAllocator tetap hanya menangani sistem hadiah.
        |
        */

        $allocated = $this->prizeAllocator
            ->allocate($event->id);

        $participantIds = $allocated
            ->pluck('participant_id')
            ->filter()
            ->unique()
            ->values();

        $participantsById = Participant::query()
            ->whereIn('id', $participantIds)
            ->get()
            ->keyBy('id');
        /*
        |--------------------------------------------------------------------------
        | REWARDS PUBLIC
        |--------------------------------------------------------------------------
        |
        | Yang dikirim ke frontend:
        | - level
        | - nama hadiah
        | - holder
        | - status occupied
        |
        | Tidak mengirim:
        | - total spending
        | - threshold
        | - nominal transaksi
        |
        */

        $rewards = $allocated
    ->map(function ($item) use ($participantsById) {

        $participant =
            $item['participant_id']
                ? $participantsById->get(
                    $item['participant_id']
                )
                : null;

        return [
            'level' =>
                $item['level'],

            'name' =>
                $item['reward_name'],

            'holder' =>
                $item['participant_name'],

            'avatar' =>
                $participant?->avatar
                    ? asset(
                        'storage/' .
                        $participant->avatar
                    )
                    : null,

            'occupied' =>
                $item['participant_id'] !== null,
        ];
    })
    ->values();


        /*
        |--------------------------------------------------------------------------
        | LEADERBOARD PUBLIC
        |--------------------------------------------------------------------------
        |
        | PENTING:
        |
        | Leaderboard TIDAK lagi mengambil data dari $allocated.
        |
        | Semua participant yang memiliki transaksi pada event
        | langsung masuk Top Spender, meskipun belum mencapai
        | Level 1 / belum unlock hadiah.
        |
        */

        $participants = $this->spendingService
            ->forEvent($event->id);


        /*
        |--------------------------------------------------------------------------
        | URUTKAN BERDASARKAN TOTAL SPENDING
        |--------------------------------------------------------------------------
        |
        | Spending terbesar berada di posisi pertama.
        |
        | Jika spending sama:
        | participant yang timestamp transaksi terakhirnya
        | lebih dulu digunakan sebagai tie-breaker.
        |
        | Jika timestamp juga sama:
        | participant ID digunakan sebagai tie-breaker terakhir.
        |
        */

        $participants = $participants
            ->sort(
                function ($a, $b) {

                    $spendingA =
                        (int) $a->total_spending;

                    $spendingB =
                        (int) $b->total_spending;


                    /*
                    |--------------------------------------------------------------------------
                    | SPENDING SAMA
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $spendingA === $spendingB
                    ) {

                        $timeA =
                            $a->last_transaction_at
                            ? strtotime(
                                $a->last_transaction_at
                            )
                            : PHP_INT_MAX;


                        $timeB =
                            $b->last_transaction_at
                            ? strtotime(
                                $b->last_transaction_at
                            )
                            : PHP_INT_MAX;


                        /*
                        |----------------------------------------------------------------------
                        | Yang lebih dulu = ranking lebih tinggi
                        |---------------------------------------------------------------------- 
                        */

                        if (
                            $timeA !== $timeB
                        ) {
                            return $timeA <=> $timeB;
                        }


                        /*
                        |----------------------------------------------------------------------
                        | Tie-breaker terakhir
                        |---------------------------------------------------------------------- 
                        */

                        return
                            $a->id
                            <=>
                            $b->id;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | SPENDING TERBESAR → TERKECIL
                    |--------------------------------------------------------------------------
                    */

                    return
                        $spendingB
                        <=>
                        $spendingA;
                }
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | BENTUK DATA LEADERBOARD PUBLIC
        |--------------------------------------------------------------------------
        |
        | TOTAL SPENDING hanya digunakan untuk menentukan ranking.
        |
        | NOMINAL SPENDING TIDAK DIKIRIM KE FRONTEND.
        |
        */

        $leaderboard = $participants
    ->map(
        function ($participant, $index) {

            return [
                'rank' =>
                    $index + 1,

                'name' =>
                    $participant->name,

                'avatar' =>
                    $participant->avatar
                        ? asset(
                            'storage/' .
                            $participant->avatar
                        )
                        : null,
            ];
        }
    )
    ->values();


        /*
        |--------------------------------------------------------------------------
        | COUNTDOWN
        |--------------------------------------------------------------------------
        */

        $now = now();


        $finished =
            $event->is_finished
            ||
            $now->greaterThanOrEqualTo(
                $event->end_at
            );


        $remainingSeconds =
            max(
                0,
                $now->diffInSeconds(
                    $event->end_at,
                    false
                )
            );


        /*
        |--------------------------------------------------------------------------
        | RESPONSE
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,

            'event' => [
                'name' =>
                    $event->name,

                'finished' =>
                    $finished,

                'remaining_seconds' =>
                    $remainingSeconds,

                'start_at' =>
                    $event->start_at
                        ?->toIso8601String(),

                'end_at' =>
                    $event->end_at
                        ?->toIso8601String(),
            ],

            'rewards' =>
                $rewards,

            'leaderboard' =>
                $leaderboard,
        ]);
    }
}