<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface UserRegisterContract
{
    public function registerUser(array $input);
}
