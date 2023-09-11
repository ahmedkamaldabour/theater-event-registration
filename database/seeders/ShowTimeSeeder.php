<?php

namespace Database\Seeders;

use App\Models\ShowTime;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ShowTime::create([
            'start_time' => Carbon::parse('6:00 PM')->format('H:i:s'),
            'end_time' => Carbon::parse('8:30 AM')->format('H:i:s')
        ]);

        ShowTime::create([
            'start_time' => Carbon::parse('8:30 PM')->format('H:i:s'),
            'end_time' => Carbon::parse('10:00 PM')->format('H:i:s')
        ]);

        ShowTime::create([
            'start_time' => Carbon::parse('10:30 PM')->format('H:i:s'),
            'end_time' => Carbon::parse('12:30 AM')->format('H:i:s')
        ]);

    }
}
