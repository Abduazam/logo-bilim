<?php

namespace App\Repositories\Features\Languages;

use App\Contracts\Interfaces\Repositories\RepositoryInterface;
use App\Models\Features\Languages\Language;
use Illuminate\Database\Eloquent\Collection;

class LanguageRepository implements RepositoryInterface
{
    public function getAll(): Collection|array
    {
        return Language::select('slug', 'title')->get();
    }

    public function getOne(): Collection|array
    {
        return Language::first();
    }

    public function getFiltered($columns, $search)
    {
        return Language::select($columns)
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })->get();
    }

    public function getCurrent()
    {
        return Language::where('slug', app()->getLocale())->pluck('title')->first();
    }
}
