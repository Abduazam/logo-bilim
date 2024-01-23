<?php

namespace Database\Seeders\Dashboard\Information\Statuses\Relatives;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

class RelativeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relativeStatuses = ['Otasi', 'Onasi'];

        foreach ($relativeStatuses as $relativeStatus) {
            RelativeStatus::create(['title' => $relativeStatus]);
        }
    }
}
