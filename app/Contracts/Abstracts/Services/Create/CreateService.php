<?php

namespace App\Contracts\Abstracts\Services\Create;

use Exception;
use App\Contracts\Interfaces\Services\ServiceCallMethodInterface;

abstract class CreateService implements ServiceCallMethodInterface
{
    abstract protected function create(): bool|Exception;

    public function callMethod(): void
    {
        $this->create();
    }
}
