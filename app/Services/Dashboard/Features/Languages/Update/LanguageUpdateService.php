<?php

namespace App\Services\Dashboard\Features\Languages\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class LanguageUpdateService extends UpdateService
{
    protected Language $language;
    protected string $title;

    public function __construct(array $data, Language $language)
    {
        $this->language = $language;
        $this->title = $data['title'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $this->language->update([
                    'title' => $this->title,
                ]);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
