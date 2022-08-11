<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface RoleCollectContract
{
    public function selectRoleForCreateUser(string $idRole);
}
