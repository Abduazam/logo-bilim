<?php

namespace App\Repositories\Dashboard\Features;

use App\Models\Dashboard\Features\Languages\Language;
use App\Models\Dashboard\Features\TableColumns\Tables\Table;
use App\Models\Dashboard\Features\Texts\Text;

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
        return Text::query()->count();
    }
}
