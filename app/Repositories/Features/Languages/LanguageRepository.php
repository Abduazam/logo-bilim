<?php

namespace App\Repositories\Features\Languages;

use App\Models\Features\Languages\Language;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Interfaces\Repositories\RepositoryInterface;

class LanguageRepository implements RepositoryInterface
{
    public function getAll(): Collection|array
    {
        return Language::select('slug', 'title')->get();
    }

    public function getOne(): Language
    {
        return Language::first();
    }

    public function getFiltered($columns, $searches, $search, $trashed, $perPage, $orderBy, $orderDirection)
    {
        $languages = Language::select($columns)
            ->when($search, function ($query, $search) use ($searches) {
                $query->where(function ($query) use ($searches, $search) {
                    foreach ($searches as $column) {
                        $query->orWhere($column, 'like', '%' . $search . '%');
                    }
                });
            })
            ->when($trashed === 1, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($trashed === 2, function ($query) {
                return $query->withTrashed();
            })
            ->orderBy($orderBy, $orderDirection);
        return $perPage === 0 ? $languages->get() : $languages->paginate($perPage);
    }

    public function getCurrent()
    {
        return Language::where('slug', app()->getLocale())->pluck('title')->first();
    }
}
