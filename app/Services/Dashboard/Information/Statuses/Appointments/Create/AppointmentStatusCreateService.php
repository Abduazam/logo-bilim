<?php

namespace App\Services\Dashboard\Information\Statuses\Appointments\Create;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class AppointmentStatusCreateService extends CreateService
{
    protected string $title;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $title = Str::title($this->title);

                AppointmentStatus::create(['title' => $title]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
