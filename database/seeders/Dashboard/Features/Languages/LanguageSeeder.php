<?php

namespace Database\Seeders\Dashboard\Features\Languages;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Features\Languages\Language;

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
