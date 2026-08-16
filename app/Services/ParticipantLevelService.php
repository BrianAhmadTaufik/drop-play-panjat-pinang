<?php

namespace App\Services;

use App\Models\Reward;
use Illuminate\Support\Collection;

class ParticipantLevelService
{
    /**
     * Tentukan level tertinggi yang dicapai
     * berdasarkan total spending.
     *
     * Contoh:
     * 250.000   -> Level 1
     * 750.000   -> Level 3
     * 999.999   -> Level 3
     * 1.000.000 -> Level 4
     */
    public function getHighestLevel(
        int $spending,
        int $eventId
    ): int {
        return (int) (
            Reward::query()
                ->where('event_id', $eventId)
                ->where(
                    'threshold_amount',
                    '<=',
                    $spending
                )
                ->max('level')
            ) ?? 0;
    }


    /**
     * Tambahkan informasi level ke seluruh participant.
     */
    public function attachLevels(
        Collection $participants,
        int $eventId
    ): Collection {
        return $participants
            ->map(
                function ($participant) use (
                    $eventId
                ) {

                    $participant->highest_level =
                        $this->getHighestLevel(
                            (int) $participant->total_spending,
                            $eventId
                        );

                    return $participant;
                }
            )
            ->values();
    }
}