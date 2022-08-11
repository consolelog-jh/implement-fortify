<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRegisterRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // rules
            // 'firstName' => ['required', 'string'],
            // 'lastName' => ['required', 'string'],
            // 'pseudo' => ['string'],
            'name' => ['required', 'string', 'max:255'], // delete this if use first_name
            // 'address' => ['string'],
            // 'codePost' => ['string'],
            // 'city' => ['string'],
            // 'phone' => ['string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ];
    }
}
