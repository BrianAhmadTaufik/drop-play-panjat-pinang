<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Reward;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $event = Event::create([
            'name' => 'Panjat Pinang Kemerdekaan 2026',

            /*
            |--------------------------------------------------------------------------
            | Untuk sistem baru, target global ini sebenarnya
            | tidak lagi dipakai untuk menentukan hadiah.
            |--------------------------------------------------------------------------
            */
            'target_amount' => 15_000_000,

            'start_at' => Carbon::now(),

            'end_at' => Carbon::now()->addDays(7),

            'is_active' => true,

            'is_finished' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | 17 LEVEL HADIAH
        |--------------------------------------------------------------------------
        */

        $rewards = [

            [
                'level' => 1,
                'name' => 'Prize 1',
                'threshold_amount' => 250_000,
            ],

            [
                'level' => 2,
                'name' => 'Prize 2',
                'threshold_amount' => 500_000,
            ],

            [
                'level' => 3,
                'name' => 'Prize 3',
                'threshold_amount' => 750_000,
            ],

            [
                'level' => 4,
                'name' => 'Prize 4',
                'threshold_amount' => 1_000_000,
            ],

            [
                'level' => 5,
                'name' => 'Prize 5',
                'threshold_amount' => 1_500_000,
            ],

            [
                'level' => 6,
                'name' => 'Prize 6',
                'threshold_amount' => 2_000_000,
            ],

            [
                'level' => 7,
                'name' => 'Prize 7',
                'threshold_amount' => 2_500_000,
            ],

            [
                'level' => 8,
                'name' => 'Prize 8',
                'threshold_amount' => 3_000_000,
            ],

            [
                'level' => 9,
                'name' => 'Prize 9',
                'threshold_amount' => 3_750_000,
            ],

            [
                'level' => 10,
                'name' => 'Prize 10',
                'threshold_amount' => 4_500_000,
            ],

            [
                'level' => 11,
                'name' => 'Prize 11',
                'threshold_amount' => 5_500_000,
            ],

            [
                'level' => 12,
                'name' => 'Prize 12',
                'threshold_amount' => 6_500_000,
            ],

            [
                'level' => 13,
                'name' => 'Prize 13',
                'threshold_amount' => 7_500_000,
            ],

            [
                'level' => 14,
                'name' => 'Prize 14',
                'threshold_amount' => 9_000_000,
            ],

            [
                'level' => 15,
                'name' => 'Prize 15',
                'threshold_amount' => 10_500_000,
            ],

            [
                'level' => 16,
                'name' => 'Prize 16',
                'threshold_amount' => 12_500_000,
            ],

            [
                'level' => 17,
                'name' => 'Grand Prize',
                'threshold_amount' => 15_000_000,
            ],

        ];


        /*
        |--------------------------------------------------------------------------
        | INSERT
        |--------------------------------------------------------------------------
        */

        foreach ($rewards as $reward) {

            Reward::create([

                'event_id' =>
                    $event->id,

                'level' =>
                    $reward['level'],

                'name' =>
                    $reward['name'],

                'threshold_amount' =>
                    $reward['threshold_amount'],

                'sort_order' =>
                    $reward['level'],

            ]);

        }
    }
}