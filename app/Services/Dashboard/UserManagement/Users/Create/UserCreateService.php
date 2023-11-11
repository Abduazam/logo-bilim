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
        $this->name = $data['form']['name'];
        $this->email = $data['form']['email'];
        $this->role = Role::findOrFail($data['form']['role_id']);
        $this->branches = array_keys($data['form']['chosen_branches']);
        $this->password = $data['form']['password'];
        $this->photo = $data['form']['photo'];
    }

    protected function create(): bool|Exception
    {
        return DB::transaction(function () {
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

            return true;
        }, 5);
    }
}
