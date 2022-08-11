<?php

declare(strict_types=1);

namespace App\Services\RoleCollect;

use App\Models\Role;
use App\Services\Contracts\RoleCollectContract;

class RoleCollectService implements RoleCollectContract
{
    /**
     * if id role exist return role else return role default => 'auth'
     *
     * @param [string] $idRole
     * @return Role
     */
    public function selectRoleForCreateUser(string $idRole)
    {
        if ($idRole) {
            return Role::find($idRole);
        } else {
            return Role::query()->where('libelle', '=', 'auth')->firstOrFail();
        }
    }
}
