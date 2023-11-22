<?php

namespace App\Services\Dashboard\Information\Branches\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class BranchUpdateService extends UpdateService
{
    protected Branch $branch;
    protected string $title;

    public function __construct(array $data, Branch $branch)
    {
        $this->branch = $branch;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->branch->update([
                    'title' => $this->title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
