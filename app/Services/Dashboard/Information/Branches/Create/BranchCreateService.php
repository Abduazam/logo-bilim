<?php

namespace App\Services\Dashboard\Information\Branches\Create;

use App\Models\Dashboard\Information\Branches\BranchService;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Branches\Branch;
use App\Contracts\Abstracts\Services\Create\CreateService;

class BranchCreateService extends CreateService
{
    protected string $title;
    protected array $services;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->services = $data['chosen_services'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $branch = Branch::create([
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

                $branch->services()->sync($syncData);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
