<?php

namespace Database\Seeders\Dashboard\Features\Languages;

use App\Models\Dashboard\Features\Languages\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'en' => "English",
        ];

        foreach ($data as $key => $value) {
            Language::create([
                'slug' => $key,
                'title' => $value,
            ]);
        }
    }
}
