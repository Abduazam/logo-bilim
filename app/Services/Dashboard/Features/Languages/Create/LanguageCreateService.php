<?php

namespace App\Services\Dashboard\Features\Languages\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Dashboard\Features\Languages\Language;
use App\Contracts\Abstracts\Services\Create\CreateService;

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
        DB::beginTransaction();
        try {
            Language::create([
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
