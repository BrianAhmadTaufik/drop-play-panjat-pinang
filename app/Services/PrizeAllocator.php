<?php

namespace App\Services;

use App\Models\Reward;
use Illuminate\Support\Collection;

class PrizeAllocator
{
    public function __construct(
        protected ParticipantSpendingService $spendingService,
        protected ParticipantLevelService $levelService,
    ) {
    }

    /**
     * Mengalokasikan hadiah berdasarkan spending
     * masing-masing participant.
     */
    public function allocate(int $eventId): Collection
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Ambil spending semua participant
        |--------------------------------------------------------------------------
        */

        $participants = $this->spendingService
            ->forEvent($eventId);


        /*
        |--------------------------------------------------------------------------
        | 2. Tentukan highest level masing-masing
        |--------------------------------------------------------------------------
        */

        $participants = $this->levelService
            ->attachLevels(
                $participants,
                $eventId
            );


        /*
        |--------------------------------------------------------------------------
        | 3. Hanya peserta yang minimal mencapai Level 1
        |--------------------------------------------------------------------------
        */

        $participants = $participants
            ->filter(
                function ($participant) {
                    return $participant->highest_level >= 1;
                }
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | 4. Urutkan spending terbesar → terkecil
        |--------------------------------------------------------------------------
        |
        | Tie-breaker sementara:
        | participant ID lebih kecil lebih dulu.
        |
        | Nanti kita ubah ke waktu pencapaian.
        |--------------------------------------------------------------------------
        */

        $participants = $participants
            ->sort(
                function ($a, $b) {

                    $spendingA =
                        (int) $a->total_spending;

                    $spendingB =
                        (int) $b->total_spending;


                    if (
                        $spendingA ===
                        $spendingB
                    ) {
                        return
                            $a->id
                            <=>
                            $b->id;
                    }


                    return
                        $spendingB
                        <=>
                        $spendingA;
                }
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | 5. Ambil semua hadiah
        |--------------------------------------------------------------------------
        */

        $rewards = Reward::query()
            ->where(
                'event_id',
                $eventId
            )
            ->orderByDesc(
                'level'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | 6. INI WAJIB:
        |    hasil alokasi dimulai dari Collection kosong
        |--------------------------------------------------------------------------
        */

        $allocated = collect();


        /*
        |--------------------------------------------------------------------------
        | 7. Isi slot hadiah dari level tertinggi
        |--------------------------------------------------------------------------
        */

        foreach ($rewards as $reward) {

            /*
            --------------------------------------------------------------
            Cari peserta terbaik yang:
            - belum mendapatkan hadiah
            - mampu mencapai level hadiah ini
            --------------------------------------------------------------
            */

            $winner = $participants
                ->first(
                    function ($participant) use (
                        $reward,
                        $allocated
                    ) {

                        /*
                        Peserta sudah punya hadiah?
                        */

                        $alreadyAllocated =
                            $allocated->contains(
                                'participant_id',
                                $participant->id
                            );


                        if (
                            $alreadyAllocated
                        ) {
                            return false;
                        }


                        /*
                        Peserta mampu mencapai
                        level hadiah ini?
                        */

                        return
                            $participant
                                ->highest_level
                            >=
                            $reward->level;
                    }
                );


            /*
            --------------------------------------------------------------
            Tidak ada pemenang
            --------------------------------------------------------------
            */

            if (!$winner) {

                $allocated->push([

                    'reward_id' =>
                        $reward->id,

                    'level' =>
                        $reward->level,

                    'reward_name' =>
                        $reward->name,

                    'threshold_amount' =>
                        $reward->threshold_amount,

                    'participant_id' =>
                        null,

                    'participant_name' =>
                        null,

                    'total_spending' =>
                        null,

                    'highest_level' =>
                        null,

                ]);

                continue;
            }


            /*
            --------------------------------------------------------------
            Ada pemenang
            --------------------------------------------------------------
            */

            $allocated->push([

                'reward_id' =>
                    $reward->id,

                'level' =>
                    $reward->level,

                'reward_name' =>
                    $reward->name,

                'threshold_amount' =>
                    $reward->threshold_amount,

                'participant_id' =>
                    $winner->id,

                'participant_name' =>
                    $winner->name,

                'total_spending' =>
                    (int) $winner->total_spending,

                'highest_level' =>
                    (int) $winner->highest_level,

            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | 8. Kembalikan hasil
        |--------------------------------------------------------------------------
        */

        return $allocated;
    }
}