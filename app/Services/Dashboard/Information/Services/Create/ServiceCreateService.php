<?php

namespace App\Services\Dashboard\Information\Services\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Services\Service;
use App\Contracts\Abstracts\Services\Create\CreateService;

class ServiceCreateService extends CreateService
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
                Service::create([
                    'title' => $this->title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
