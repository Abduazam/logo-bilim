<?php

namespace Database\Seeders\Dashboard\Information\RelativeStatuses;

use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatusTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelativeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relativeStatuses = [
            [
                'slug' => 'en',
                'translation' => 'father',
            ],
            [
                'slug' => 'en',
                'translation' => 'mother',
            ],
            [
                'slug' => 'en',
                'translation' => 'uncle',
            ],
            [
                'slug' => 'en',
                'translation' => 'aunt',
            ],
        ];

        foreach ($relativeStatuses as $relativeStatus) {
            $newRelativeStatus = RelativeStatus::create();

            $relativeStatus['relative_status_id'] = $newRelativeStatus->id;

            RelativeStatusTranslation::create($relativeStatus);
        }
    }
}
