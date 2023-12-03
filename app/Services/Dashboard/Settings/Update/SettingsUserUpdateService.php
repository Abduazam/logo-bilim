<?php

namespace App\Services\Dashboard\Settings\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class SettingsUserUpdateService extends UpdateService
{
    protected User $user;
    protected string $name;
    protected string $email;
    protected ?string $password;
    protected mixed $photo;

    public function __construct(array $data, User $user)
    {
        $this->user = $user;
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->photo = $data['photo'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $user = [
                    'name' => $this->name,
                    'email' => $this->email,
                ];

                $user['photo'] = $this->photo;
                if (!is_null($this->photo) && $this->user->photo != $this->photo) {
                    $upload = new Upload($this->photo, 'users', $this->user, 'photo');
                    $user['photo'] = $upload->uploadMedia();
                }

                if (!is_null($this->password)) {
                    $user['password'] = Hash::make($this->password);
                }

                $this->user->update($user);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
