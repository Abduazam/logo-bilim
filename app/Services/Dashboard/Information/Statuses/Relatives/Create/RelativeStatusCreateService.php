<?php

namespace App\Services\Dashboard\Information\Statuses\Relatives\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatusTranslation;

class RelativeStatusCreateService extends CreateService
{
    protected array $translations;

    public function __construct(array $data)
    {
        $this->translations = $data['translations'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $newRelativeStatus = RelativeStatus::create();

                foreach ($this->translations as $key => $translation) {
                    RelativeStatusTranslation::create([
                        'relative_status_id' => $newRelativeStatus->id,
                        'slug' => $key,
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
