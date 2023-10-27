<?php

namespace App\Services\Dashboard\Features\Languages\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Create\CreateService;
use App\Events\Dashboard\Models\Features\Languages\LanguageCreated;

class LanguageCreateService extends CreateService
{
    protected string $slug;
    protected string $title;

    public function __construct(array $data)
    {
        $this->slug = $data['form']['slug'];
        $this->title = $data['form']['title'];
    }

    protected function create(): bool|Exception
    {
        return DB::transaction(function () {
            $language = Language::create([
                'slug' => $this->slug,
                'title' => $this->title,
            ]);

            event(new LanguageCreated($language));

            return true;
        }, 5);
    }
}
