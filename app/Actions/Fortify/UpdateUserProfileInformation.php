<?php

namespace App\Actions\Fortify;

use App\Http\Requests\UserUpdateRequest;
use App\Services\UserFill\UserFillService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * instance UserFillService
     *
     * @var [type]
     */
    public $userFillService;

    /**
     * instance UserUpdateRequest
     *
     * @var [type]
     */
    public $userUpdateRequest;

    /**
     * init class
     *
     * @param UserUpdateRequest $userUpdateRequest
     */
    public function __construct(
        UserUpdateRequest $userUpdateRequest,
        UserFillService $userFillService,
    ) {
        $this->userUpdateRequest = $userUpdateRequest;
        $this->userFillService = $userFillService;
    }

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make(
            $input,
            $this->userUpdateRequest->rules($user->id)
        )->validate();

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill(
                $this->userFillService->updateFill($input)
            )->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill(
            $this->userFillService->updateVerifiedFill($input)
        )->save();

        $user->sendEmailVerificationNotification();
    }
}
