<?php

namespace App\Services\Dashboard\Features\Texts\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Dashboard\Features\Texts\Text;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class TextUpdateService extends UpdateService
{
    protected string $key;
    protected string $icon;
    protected array $translations = [];
    protected Text $text;

    public function __construct(array $data, Text $text)
    {
        $this->key = $data['form']['key'];
        $this->icon = $data['form']['icon'];
        $this->translations = $data['form']['translations'];
        $this->text = $text;
    }

    protected function update(): bool|Exception
    {
        return DB::transaction(function () {
            $icon = $this->icon ?: null;
            $this->text->update(['icon' => $icon]);
            $this->updateTranslations();

            return true;
        }, 5);
    }

    protected function updateTranslations(): void
    {
        $translations = $this->text->translations->keyBy('slug');

        foreach ($this->translations as $key => $translation) {
            if ($translations->has($key)) {
                $translations->get($key)->update(['translation' => $translation]);

                $cacheKey = 'text_translation_' . $key . '_' . $this->text->key;
                Cache::forget($cacheKey);
            }
        }
    }
}
