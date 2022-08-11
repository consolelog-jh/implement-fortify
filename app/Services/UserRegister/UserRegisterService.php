<?php

declare(strict_types=1);

namespace App\Services\UserRegister;

use App\Models\User;
use App\Services\Contracts\UserRegisterContract;
use App\Services\RoleCollect\RoleCollectService;
use App\Services\UserFill\UserFillService;

class UserRegisterService implements UserRegisterContract
{
    /**
     * instance RoleCollect service
     *
     * @var [type]
     */
    public $roleCollect;

    /**
     * instance UserFill service
     *
     * @var [type]
     */
    public $userFillService;

    /**
     * init class
     *
     * @param RoleCollectService $roleCollect
     */
    public function __construct(
        RoleCollectService $roleCollect,
        UserFillService $userFillService,
    ) {
        $this->roleCollect = $roleCollect;
        $this->userFillService = $userFillService;
    }

    /**
     * create new user
     *
     * @return User
     */
    public function registerUser(array $input)
    {
        // get role for add user after
        $role = $this->roleService->selectRoleForCreateUser($input['role']);

        // create user in bdd
        $user = User::create($this->userFillService->createFill($input));

        // assign role in user
        $role->users()->save($user);

        return $user;
    }
}
