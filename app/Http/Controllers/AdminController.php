<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\Participant;
use App\Services\ParticipantSpendingService;
use App\Services\ParticipantLevelService;
use App\Services\PrizeAllocator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct(
        protected ParticipantSpendingService $spendingService,
        protected ParticipantLevelService $levelService,
        protected PrizeAllocator $prizeAllocator,
    ) {
    }


    /**
     * Dashboard admin.
     */
    public function index(): View
    {
        $event = Event::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();


        if (!$event) {
            return view('admin', [
                'event' => null,
                'participants' => collect(),
                'recentTransactions' => collect(),
                'allocated' => collect(),
                'remainingSeconds' => 0,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Participant + spending
        |--------------------------------------------------------------------------
        */

        $participants = $this->spendingService
            ->forEvent($event->id);


        /*
        |--------------------------------------------------------------------------
        | Participant + highest level
        |--------------------------------------------------------------------------
        */

        $participants = $this->levelService
            ->attachLevels(
                $participants,
                $event->id
            );


        /*
        |--------------------------------------------------------------------------
        | Alokasi hadiah
        |--------------------------------------------------------------------------
        */

        $allocated = $this->prizeAllocator
            ->allocate(
                $event->id
            );


        /*
        |--------------------------------------------------------------------------
        | Buat mapping participant_id → hadiah
        |--------------------------------------------------------------------------
        */

        $prizeMap = $allocated
            ->filter(
                fn ($item) =>
                    $item['participant_id'] !== null
            )
            ->keyBy(
                'participant_id'
            );


        /*
        |--------------------------------------------------------------------------
        | Tambahkan informasi hadiah ke participant
        |--------------------------------------------------------------------------
        */

        $participants = $participants
            ->map(
                function ($participant) use (
                    $prizeMap
                ) {

                    $prize =
                        $prizeMap->get(
                            $participant->id
                        );


                    $participant->current_reward =
                        $prize
                            ? $prize['reward_name']
                            : null;


                    $participant->current_reward_level =
                        $prize
                            ? $prize['level']
                            : null;


                    return $participant;
                }
            )
            ->sortByDesc(
                'total_spending'
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Transaksi terbaru
        |--------------------------------------------------------------------------
        */

        $recentTransactions =
            $event->transactions()
                ->with(
                    'participant:id,name'
                )
                ->latest('id')
                ->limit(50)
                ->get();


        /*
        |--------------------------------------------------------------------------
        | Countdown
        |--------------------------------------------------------------------------
        */

        $remainingSeconds = max(
            0,
            now()->diffInSeconds(
                $event->end_at,
                false
            )
        );


        return view('admin', [

            'event' =>
                $event,

            'participants' =>
                $participants,

            'recentTransactions' =>
                $recentTransactions,

            'allocated' =>
                $allocated,

            'remainingSeconds' =>
                $remainingSeconds,

        ]);
    }


    /**
     * Tambah top up.
     */
    public function topup(
        Request $request
    ): RedirectResponse {

        $validated =
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'amount' => [
                    'required',
                    'integer',
                    'min:1',
                ],
            ]);


        $event = Event::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();


        if (!$event) {

            return back()
                ->withErrors([
                    'name' =>
                        'Tidak ada event aktif.',
                ])
                ->withInput();

        }


        if (
            $event->is_finished ||
            now()->greaterThanOrEqualTo(
                $event->end_at
            )
        ) {

            return back()
                ->withErrors([
                    'name' =>
                        'Event sudah selesai.',
                ])
                ->withInput();

        }


        DB::transaction(
            function () use (
                $validated,
                $event
            ) {

                $name =
                    trim(
                        $validated['name']
                    );


                $participant =
                    Participant::firstOrCreate(
                        [
                            'name' =>
                                $name,
                        ]
                    );


                Transaction::create([
                    'event_id' =>
                        $event->id,

                    'participant_id' =>
                        $participant->id,

                    'amount' =>
                        $validated['amount'],

                    'source' =>
                        'admin',
                ]);
            }
        );


        return back()->with(
            'success',
            'Top up berhasil ditambahkan.'
        );
    }


    /**
     * Hapus transaksi.
     */
    public function destroy(
        Transaction $transaction
    ): RedirectResponse {

        $event = Event::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();


        if (!$event) {

            return back()
                ->withErrors([
                    'delete' =>
                        'Tidak ada event aktif.',
                ]);

        }


        if (
            $transaction->event_id !==
            $event->id
        ) {

            abort(404);

        }


        if (
            $event->is_finished ||
            now()->greaterThanOrEqualTo(
                $event->end_at
            )
        ) {

            return back()
                ->withErrors([
                    'delete' =>
                        'Event sudah selesai.',
                ]);

        }


        $transaction->delete();


        return back()->with(
            'success',
            'Transaksi berhasil dihapus.'
        );
    }
}