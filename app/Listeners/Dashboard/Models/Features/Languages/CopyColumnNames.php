<?php

namespace App\Listeners\Dashboard\Models\Features\Languages;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Dashboard\Models\Features\Languages\LanguageCreated;
use App\Models\Dashboard\Features\TableColumns\Columns\ColumnTranslation;

class CopyColumnNames implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LanguageCreated $event): void
    {
        $columns = ColumnTranslation::select('column_id')->distinct()->get();

        DB::transaction(function () use ($event, $columns) {
            $newRecords = [];

            $timestamp = now();

            foreach ($columns as $column) {
                $newRecords[] = [
                    'column_id' => $column->column_id,
                    'slug' => $event->language->slug,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }

            ColumnTranslation::insert($newRecords);
        });
    }
}
