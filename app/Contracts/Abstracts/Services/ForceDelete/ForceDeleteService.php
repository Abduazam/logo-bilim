<?php

namespace App\Contracts\Abstracts\Services\ForceDelete;

use Exception;
use App\Contracts\Interfaces\Services\ServiceCallMethodInterface;

abstract class ForceDeleteService implements ServiceCallMethodInterface
{
    abstract protected function forceDelete(): bool|Exception;

    public function callMethod(): void
    {
        $this->forceDelete();
    }
}
