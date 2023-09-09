<?php

namespace App\Contracts\Interfaces\Components\Forms\Tables;

interface TableInterface
{
    public function getColumnNames();

    public function getColumnMethod($column);

    public function getColumnMethodBrace($column);

    public function getColumnMethodClass($column);
}
