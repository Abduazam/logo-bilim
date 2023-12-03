<?php

namespace App\Repositories\Dashboard\Information\Clients;

use App\Models\Dashboard\Information\Clients\Client;

class ClientRepository
{
    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $result = Client::select(['id', 'first_name', 'last_name', 'dob', 'photo', 'created_at', 'deleted_at'])
            ->withCount('relatives')
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%$search%")->orWhere('last_name', 'like', "%$search%");
                });
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                return $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $result->get() : $result->paginate($perPage);
    }
}
