<?php

namespace App\Helpers\Classes\Breadcrumbs;

use Illuminate\Http\Request;
use App\Helpers\Services\TextsService\getTextTranslationService;

class Segment
{
    protected Request $request;
    protected string $segment;

    public function __construct(Request $request, $segment)
    {
        $this->request = $request;
        $this->segment = $segment;
    }

    public function name(): string
    {
        return getTextTranslationService::getTextTranslation($this->segment);
    }

    public function model()
    {
        return collect($this->request->route()->parameters())->where('slug', $this->segment)->first();
    }

    public function url(): string
    {
        return url(implode('/', array_slice($this->request->segments(), 0, $this->position() + 1)));
    }

    public function position(): bool|int|string
    {
        return array_search($this->segment, $this->request->segments());
    }
}
