<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\User;

interface UserUpdateRoleContract
{
    public function updateRole(User $user, array $input);
}
