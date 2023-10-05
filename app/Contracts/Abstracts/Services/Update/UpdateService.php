<?php

namespace App\Contracts\Abstracts\Services\Update;

use Exception;
use App\Contracts\Interfaces\Services\ServiceCallMethodInterface;

abstract class UpdateService implements ServiceCallMethodInterface
{
    abstract protected function update(): bool|Exception;

    public function callMethod(): bool|Exception
    {
        return $this->update();
    }
}
