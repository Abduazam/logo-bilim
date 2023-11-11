<?php

namespace App\Services\Dashboard\UserManagement\Users\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\UserManagement\Roles\Role;
use App\Models\Dashboard\UserManagement\Users\User;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class UserUpdateService extends UpdateService
{
    protected User $user;
    protected string $name;
    protected string $email;
    protected Role $role;
    protected array $branches;
    protected ?string $password;
    protected mixed $photo;

    public function __construct(array $data, User $user)
    {
        $this->user = $user;
        $this->name = $data['form']['name'];
        $this->email = $data['form']['email'];
        $this->role = Role::findOrFail($data['form']['role_id']);
        $this->branches = array_keys($data['form']['chosen_branches']);
        $this->password = $data['form']['password'];
        $this->photo = $data['form']['photo'];
    }

    protected function update(): bool|Exception
    {
        return DB::transaction(function () {
            $userAttributes = [
                'name' => $this->name,
                'email' => $this->email,
            ];

            $userAttributes['photo'] = $this->photo;
            if (!is_null($this->photo) && $this->user->photo != $this->photo) {
                $upload = new Upload($this->photo, 'users', $this->user, 'photo');
                $userAttributes['photo'] = $upload->uploadMedia();
            }

            if (!is_null($this->password)) {
                $userAttributes['password'] = Hash::make($this->password);
            }

            $this->user->update($userAttributes);

            $this->user->branches()->syncWithPivotValues($this->branches, ['updated_at' => now()]);

            if (!$this->user->hasRole($this->role->name)) {
                $this->user->syncRoles([$this->role]);
            }

            return true;
        }, 5);
    }
}
