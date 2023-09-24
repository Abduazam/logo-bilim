<?php

namespace App\Contracts\Abstracts\Services\Delete;

use Exception;
use App\Contracts\Interfaces\Services\ServiceCallMethodInterface;

abstract class DeleteService implements ServiceCallMethodInterface
{
    abstract protected function delete(): bool|Exception;

    public function callMethod(): void
    {
        $this->delete();
    }
}
