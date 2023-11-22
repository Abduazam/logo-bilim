<?php

namespace App\Services\Dashboard\Information\Branches\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Create\CreateService;

class BranchCreateService extends CreateService
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
                Branch::create([
                    'title' => $this->title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
