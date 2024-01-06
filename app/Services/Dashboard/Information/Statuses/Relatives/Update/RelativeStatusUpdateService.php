<?php

namespace App\Services\Dashboard\Information\Statuses\Relatives\Update;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Update\UpdateService;
use App\Models\Dashboard\Information\Statuses\Relatives\RelativeStatus;

class RelativeStatusUpdateService extends UpdateService
{
    protected RelativeStatus $relativeStatus;
    protected string $title;

    public function __construct(array $data, RelativeStatus $relativeStatus)
    {
        $this->relativeStatus = $relativeStatus;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $title = Str::title($this->title);

                $this->relativeStatus->update(['title' => $title]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
