<?php

namespace App\Repositories\Dashboard\Management\Consumptions;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Management\Consumptions\Consumption;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;

class ConsumptionRepository
{
    public function getAll(): Collection
    {
        return Consumption::all();
    }

    public function getTotalInToday()
    {
        $branches = $this->getBranches();

        return Consumption::whereDate('created_at', now())->whereIn('branch_id', $branches)->count();
    }

    public function getSumInToday()
    {
        $branches = $this->getBranches();

        return Consumption::whereDate('created_at', now())->whereIn('branch_id', $branches)->sum('amount');
    }

    public function getFiltered()
    {
        return Consumption::select('id', 'user_id', 'branch_id', 'amount', 'comment', 'created_at')
            ->with('user', 'branch')
            ->whereDate('created_at', now())
            ->orderByDesc('id')
            ->get();
    }

    private function getBranches(): array
    {
        return (new BranchRepository())->getByUser(auth()->user())->pluck('id')->toArray();
    }
}
