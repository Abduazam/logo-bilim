<?php

namespace App\Services\Dashboard\Information\Branches\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class BranchUpdateService extends UpdateService
{
    protected string $title;
    protected Branch $branch;

    public function __construct(array $data, Branch $branch)
    {
        $this->title = $data['form']['title'];
        $this->branch = $branch;
    }

    protected function update(): bool|Exception
    {
        return DB::transaction(function () {
            $this->branch->update([
                'title' => $this->title,
            ]);

            return true;
        }, 5);
    }
}
