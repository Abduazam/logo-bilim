<?php

namespace Database\Seeders\Dashboard\Information\Branches;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Branches\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            "Chorsu filiali",
            "G'uncha filiali",
            "Yunusobod filiali"
        ];

        foreach ($branches as $branch) {
            Branch::create([
                'title' => $branch,
            ]);
        }
    }
}
