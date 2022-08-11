<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface UserDeleteContract
{
    public function deleteUser(string $id);
}
