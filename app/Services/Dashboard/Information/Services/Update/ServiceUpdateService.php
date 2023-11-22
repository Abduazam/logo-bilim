<?php

namespace App\Services\Dashboard\Information\Services\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class ServiceUpdateService extends UpdateService
{
    protected Service $service;
    protected string $title;

    public function __construct(array $data, Service $service)
    {
        $this->service = $service;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->service->update([
                    'title' => $this->title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
