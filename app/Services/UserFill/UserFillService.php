<?php

declare(strict_types=1);

namespace App\Services\UserFill;

use Illuminate\Support\Facades\Hash;
use App\Services\Contracts\UserFillContract;

class UserFillService implements UserFillContract
{
    /**
     * return object fill for create user
     *
     * @param array $input
     * @return void
     */
    public function createFill(array $input)
    {
        return [
            // 'first_name' => $input['firstName'],
            // 'last_name' => $input['lastName'],
            // 'pseudo' => $input['pseudo'],
            'name' => $input['name'], // delete this if use first_name
            // 'name' => $input['firstName'] . ' ' . $input['lastName'],
            // 'address' => $input['address'],
            // 'code_post' => $input['codePost'],
            // 'city' => $input['city'],
            // 'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ];
    }

    /**
     * return object fill for update user
     *
     * @param array $input
     * @return void
     */
    public function updateFill(array $input)
    {
        return [
            // 'first_name' => $input['firstName'],
            // 'last_name' => $input['lastName'],
            // 'pseudo' => $input['pseudo'],
            'name' => $input['name'],
            // 'name' => $input['firstName'] . ' ' . $input['lastName'],
            // 'address' => $input['address'],
            // 'code_post' => $input['codePost'],
            // 'city' => $input['city'],
            // 'phone' => $input['phone'],
            'email' => $input['email'],
        ];
    }

    /**
     * return object fill for update user with verify email
     *
     * @param array $input
     * @return void
     */
    public function updateVerifiedFill(array $input)
    {
        return [
            // 'first_name' => $input['firstName'],
            // 'last_name' => $input['lastName'],
            // 'pseudo' => $input['pseudo'],
            'name' => $input['name'],
            // 'name' => $input['firstName'] . ' ' . $input['lastName'],
            // 'address' => $input['address'],
            // 'code_post' => $input['codePost'],
            // 'city' => $input['city'],
            // 'phone' => $input['phone'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ];
    }
}
