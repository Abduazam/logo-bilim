<?php

namespace App\Repositories\Dashboard\Features\Languages;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Dashboard\Features\Languages\Language;
use App\Repositories\Dashboard\Features\TableColumns\Tables\TableRepository;

class LanguageRepository
{
    protected TableRepository $repository;

    public function __construct()
    {
        $this->repository = new TableRepository();
    }

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

    public function getVisibleColumns(): Collection
    {
        return $this->repository->getVisibleColumns('languages');
    }

    public function getActiveColumns(): array
    {
        return $this->repository->getActiveColumns('languages');
    }

    public function getFiltered(
        string $search,
        int $perPage,
        bool $with_trashed,
        string $orderBy,
        string $orderDirection,
    ) {
        $languages = Language::select($this->getActiveColumns())
            ->when($with_trashed, function ($query) {
                return $query->onlyTrashed();
            })
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($orderBy, function ($query, $orderBy) use ($orderDirection) {
                $query->orderBy($orderBy, $orderDirection);
            });

        return $perPage === 0 ? $languages->get() : $languages->paginate($perPage);
    }
}
