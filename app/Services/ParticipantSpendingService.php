<?php

namespace App\Services;

use App\Models\Participant;
use Illuminate\Support\Collection;

class ParticipantSpendingService
{
    /**
     * Ambil seluruh participant yang memiliki transaksi
     * pada event tertentu, beserta:
     *
     * - total_spending
     * - transaction_count
     * - last_transaction_at
     */
    public function forEvent(int $eventId): Collection
    {
        return Participant::query()

            ->whereHas(
                'transactions',
                function ($query) use ($eventId) {

                    $query->where(
                        'event_id',
                        $eventId
                    );

                }
            )

            /*
            |--------------------------------------------------------------------------
            | TOTAL SPENDING
            |--------------------------------------------------------------------------
            */

            ->withSum(
                [
                    'transactions as total_spending' =>
                        function ($query) use ($eventId) {

                            $query->where(
                                'event_id',
                                $eventId
                            );

                        }
                ],
                'amount'
            )

            /*
            |--------------------------------------------------------------------------
            | JUMLAH TRANSAKSI
            |--------------------------------------------------------------------------
            */

            ->withCount(
                [
                    'transactions as transaction_count' =>
                        function ($query) use ($eventId) {

                            $query->where(
                                'event_id',
                                $eventId
                            );

                        }
                ]
            )

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI TERAKHIR
            |--------------------------------------------------------------------------
            |
            | Ini kita gunakan untuk tie-breaker.
            |
            | Kalau dua participant punya spending yang sama,
            | participant yang lebih dulu mencapai total tersebut
            | akan menang.
            |
            */

            ->withMax(
                [
                    'transactions as last_transaction_at' =>
                        function ($query) use ($eventId) {

                            $query->where(
                                'event_id',
                                $eventId
                            );

                        }
                ],
                'created_at'
            )

            ->get()

            ->map(
                function ($participant) {

                    /*
                    |--------------------------------------------------------------------------
                    | Pastikan tipe data konsisten
                    |--------------------------------------------------------------------------
                    */

                    $participant->total_spending =
                        (int) (
                            $participant->total_spending
                            ?? 0
                        );


                    $participant->transaction_count =
                        (int) (
                            $participant->transaction_count
                            ?? 0
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | last_transaction_at
                    |--------------------------------------------------------------------------
                    |
                    | Kita sengaja tidak mengubah nilainya.
                    | Laravel akan membawa nilai datetime dari PostgreSQL.
                    |
                    */

                    return $participant;
                }
            )

            ->values();
    }


    /**
     * Ambil total spending satu participant
     * untuk event tertentu.
     */
    public function forParticipant(
        int $eventId,
        int $participantId
    ): int {
        return (int) (

            Participant::query()

                ->whereKey(
                    $participantId
                )

                ->whereHas(
                    'transactions',
                    function ($query) use ($eventId) {

                        $query->where(
                            'event_id',
                            $eventId
                        );

                    }
                )

                ->withSum(
                    [
                        'transactions as total_spending' =>
                            function ($query) use ($eventId) {

                                $query->where(
                                    'event_id',
                                    $eventId
                                );

                            }
                    ],
                    'amount'
                )

                ->value(
                    'total_spending'
                )

                ?? 0
        );
    }
}