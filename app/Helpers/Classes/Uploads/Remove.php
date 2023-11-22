<?php

namespace App\Helpers\Classes\Uploads;

use Illuminate\Support\Facades\File;

class Remove
{
    public function __construct(
        protected string $folder,
        protected $model = null,
        protected $modelColumn = null,
    ) { }

    public function removeMedia(): void
    {
        if (isset($this->model->{$this->modelColumn}) and File::exists(public_path('storage/' . $this->model->{$this->modelColumn}))) {
            unlink(storage_path('app/public/' . $this->model->{$this->modelColumn}));
        }
    }
}
