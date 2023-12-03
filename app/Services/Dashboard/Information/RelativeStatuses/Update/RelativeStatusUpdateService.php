<?php

namespace App\Services\Dashboard\Information\RelativeStatuses\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\RelativeStatuses\RelativeStatus;

class RelativeStatusUpdateService extends UpdateService
{
    protected RelativeStatus $relativeStatus;
    protected array $translations;

    public function __construct(array $data, RelativeStatus $relativeStatus)
    {
        $this->relativeStatus = $relativeStatus;
        $this->translations = $data['translations'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                foreach ($this->translations as $key => $translation) {
                    $this->relativeStatus->translations->where('slug', $key)->first()->update([
                        'translation' => $translation,
                    ]);
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
