<?php

namespace App\Repositories\Dashboard\Features\Languages;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Features\Languages\Language;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;

class LanguageRepository
{
    public function getAll(): Collection
    {
        return Language::select('slug', 'title')->get();
    }

    public function getOne(): Language
    {
        return Language::first();
    }

    public function getCurrent(): string
    {
        $language = Language::where('slug', app()->getLocale())->pluck('title')->first();
        if ($language) {
            return $language;
        }

        return Language::pluck('title')->first();
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $languages = Language::select(['id', 'slug', 'title', 'created_at', 'deleted_at'])
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%');
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $languages->get() : $languages->paginate($perPage);
    }
}
