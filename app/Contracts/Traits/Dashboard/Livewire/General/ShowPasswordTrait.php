<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait ShowPasswordTrait
{
    public string $passwordInputType = 'password';
    public int $passwordInputShowButtonOpacity = 0;
    public string $passwordInputEyeIcon = 'fa-eye';

    public function showPassword(): void
    {
        $this->passwordInputType = $this->passwordInputType === 'password' ? 'text' : 'password';
        $this->passwordInputEyeIcon = $this->passwordInputEyeIcon === 'fa-eye' ? 'fa-eye-slash' : 'fa-eye';
    }

    public function showEyeButton(): void
    {
        $this->passwordInputShowButtonOpacity = 75;
    }
}
