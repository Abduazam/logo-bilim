<?php

namespace App\Repositories\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Branches\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Information\Clients\Client;

class ClientRepository
{
    public function findByNameAndLastname(string $first_name, string $last_name)
    {
        return Client::where('first_name', $first_name)->where('last_name', $last_name)->first();
    }

    public function getSearched(?string $search)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $branchIds = Branch::pluck('id')->toArray();
        } else {
            $branchIds = $user->branches->pluck('id')->toArray();
        }

        return Client::select(['id', 'branch_id', 'first_name', 'last_name', 'dob'])
            ->whereIn('branch_id', $branchIds)
            ->orWhereNull('branch_id')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $search = strtolower($search);

                    $query->where(DB::raw('LOWER(first_name)'), 'like', "%$search%")
                        ->orWhere(DB::raw('LOWER(last_name)'), 'like', "%$search%");
                });
            })->take(3)->get();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $branchIds = Branch::pluck('id')->toArray();
        } else {
            $branchIds = $user->branches->pluck('id')->toArray();
        }

        $result = Client::select(['id', 'branch_id', 'first_name', 'last_name', 'dob', 'photo', 'created_at', 'deleted_at'])
            ->with('branch')
            ->withCount('relatives')
            ->whereIn('branch_id', $branchIds)
            ->orWhereNull('branch_id')
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $search = strtolower($search);

                    $query->where(DB::raw('LOWER(first_name)'), 'like', "%$search%")
                        ->orWhere(DB::raw('LOWER(last_name)'), 'like', "%$search%");
                });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                return $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
