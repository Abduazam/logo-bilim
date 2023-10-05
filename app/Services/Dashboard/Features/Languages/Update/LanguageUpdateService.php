<?php

namespace App\Services\Dashboard\Features\Languages\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class LanguageUpdateService extends UpdateService
{
    protected string $slug;
    protected string $title;
    protected Language $language;

    public function __construct(array $data, Language $language)
    {
        $this->slug = $data['form']['slug'];
        $this->title = $data['form']['title'];
        $this->language = $language;
    }

    protected function update(): bool|Exception
    {
        DB::beginTransaction();
        try {
            $this->language->update([
                'slug' => $this->slug,
                'title' => $this->title,
            ]);

            DB::commit();

            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}