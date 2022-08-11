<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface UserFillContract
{
    public function createFill(array $input);
    public function updateFill(array $input);
    public function updateVerifiedFill(array $input);
}
