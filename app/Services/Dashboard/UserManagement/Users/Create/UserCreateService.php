<?php

namespace App\Services\Dashboard\UserManagement\Users\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\Create\CreateService;

class UserCreateService extends CreateService
{
    protected string $name;
    protected string $email;
    protected Role $role;
    protected array $branches;
    protected string $password;
    protected mixed $photo;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->role = Role::findOrFail($data['role_id']);
        $this->branches = array_keys($data['chosen_branches']);
        $this->password = $data['password'];
        $this->photo = $data['photo'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $photo = null;
                if (!is_null($this->photo)) {
                    $upload = new Upload($this->photo, 'users');
                    $photo = $upload->uploadMedia();
                }

                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'email_verified_at' => now(),
                    'photo' => $photo,
                ]);

                $user->branches()->syncWithPivotValues($this->branches, ['created_at' => now(), 'updated_at' => now()]);

                $user->assignRole($this->role);
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
