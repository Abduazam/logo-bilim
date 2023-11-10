<?php

namespace App\Repositories\Dashboard\Features;

use App\Models\Dashboard\Features\Languages\Language;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;

class FeatureRepository
{
    public function getLanguagesCount(): int
    {
        return Language::query()->count();
    }

    public function getTableColumnsCount(): int
    {
        return Table::query()->count();
    }

    public function getTextsCount(): int
    {
        return 0;
    }

    public function getIconsCount(): int
    {
        return 2185;
    }
}
