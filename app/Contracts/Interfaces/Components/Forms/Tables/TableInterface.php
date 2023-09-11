<?php

namespace App\Contracts\Interfaces\Components\Forms\Tables;

interface TableInterface
{
    public function getColumnNames();

    public function getColumnSorted();

    public function getColumnMethod($column);

    public function getColumnMethodBrace($column);

    public function getColumnMethodClass($column);

    public function sortUp($column);

    public function sortDown($column);
}
