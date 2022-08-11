<?php

namespace App\Actions\Fortify;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserRegister\UserRegisterService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{

    /**
     * instance RegisterUserRequest
     *
     * @var [RegisterUserRequest]
     */
    public $userRegisterRequest;

    /**
     * instance UserRegister service
     *
     * @var [type]
     */
    public $userRegisterService;

    public function __construct(
        UserRegisterRequest $userRegisterRequest,
        UserRegisterService $userRegisterService
    ) {
        $this->userRegisterRequest = $userRegisterRequest;
        $this->userRegisterService = $userRegisterService;
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make(
            $input,
            $this->userRegisterRequest->rules(),
        )->validate();

        return $this->userRegisterService->registerUser($input);
    }
}
