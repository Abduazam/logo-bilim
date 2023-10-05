<?php

namespace App\Contracts\Interfaces\Services;

use Exception;

interface ServiceCallMethodInterface
{
    public function callMethod(): bool|Exception;
}
