<?php

namespace App\Contracts\Abstracts\Services\Restore;

use Exception;
use App\Contracts\Interfaces\Services\ServiceCallMethodInterface;

abstract class RestoreService implements ServiceCallMethodInterface
{
    abstract protected function restore(): bool|Exception;

    public function callMethod(): void
    {
        $this->restore();
    }
}
