<?php

declare(strict_types=1);

namespace App\Services\UserUpdateRole;

use App\Models\Role;
use App\Services\Contracts\UserUpdateRoleContract;

class UserUpdateRoleService implements UserUpdateRoleContract
{
    /**
     * update role's user
     *
     * @param [type] $user
     * @param array $input
     * @return void
     */
    public function updateRole($user, array $input)
    {
        if (
            $user->role->libelle == 'root' ||
            $user->role->libelle == 'admin' &&
            $input['role'] == ''
        ) {
            $role = Role::find($input['role']);
            $role->users()->save($user);
        }
    }
}
