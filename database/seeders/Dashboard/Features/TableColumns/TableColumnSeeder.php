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
        $tables = Schema::getAllTables();

        $tablesToRemove = ['failed_jobs', 'migrations', 'password_reset_tokens', 'password_resets', 'personal_access_tokens', 'jobs'];

        foreach ($tables as $key => $table) {
            $tableName = $table->tablename;

            if (in_array($tableName, $tablesToRemove)) {
                unset($tables[$key]);
            }
        }

        foreach ($tables as $table) {
            $tableRecord = Table::create([
                'name' => $table->tablename
            ]);

            $columns = Schema::getColumnListing($tableRecord->name);

            foreach ($columns as $column) {
                $visible = true;
                if ($tableRecord->name === 'columns') {
                    $visible = match ($column) {
                        'id', 'table_id', 'created_at', 'updated_at' => false,
                        default => true,
                    };
                } else {
                    if (in_array($column, ['updated_at', 'deleted_at'])) {
                        $visible = false;
                    }
                }

                $columnRecord = Column::create([
                    'table_id' => $tableRecord->id,
                    'name' => $column,
                    'visible' => $visible
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
