<?php

namespace Database\Seeders\Dashboard\Features\TableColumns;

use App\Models\Dashboard\Features\TableColumns\Columns\Column;
use App\Models\Dashboard\Features\TableColumns\Columns\ColumnTranslation;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TableColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = DB::select("SELECT TABLE_NAME
          FROM INFORMATION_SCHEMA.COLUMNS
          WHERE TABLE_SCHEMA = '" . config('database.db_name') . "'
          AND TABLE_NAME NOT IN ('failed_jobs', 'migrations', 'password_reset_tokens', 'password_resets', 'personal_access_tokens') GROUP BY TABLE_NAME");

        foreach ($tables as $table) {
            $tableRecord = Table::create([
                'name' => $table->TABLE_NAME
            ]);

            $columns = Schema::getColumnListing($table->TABLE_NAME);

            foreach ($columns as $column) {
                $columnRecord = Column::create([
                    'table_id' => $tableRecord->id,
                    'name' => $column
                ]);

                ColumnTranslation::create([
                    'column_id' => $columnRecord->id,
                    'slug' => app()->getLocale(),
                    'translation' => ucfirst($column)
                ]);
            }
        }
    }
}
