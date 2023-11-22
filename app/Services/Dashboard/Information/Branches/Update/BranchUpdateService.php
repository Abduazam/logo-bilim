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
    protected array $services;

    public function __construct(array $data, Branch $branch)
    {
        $this->branch = $branch;
        $this->title = $data['title'];
        $this->services = $data['chosen_services'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->branch->update([
                    'title' => $this->title,
                ]);

                $syncData = [];
                foreach ($this->services as $id => $service) {
                    $syncData[$id] = [
                        'price' => $service['price'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }

                $this->branch->services()->sync($syncData);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
