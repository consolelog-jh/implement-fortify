<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
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
    public function rules($id)
    {
        return [
            // rules
            // 'firstName' => ['required', 'string'],
            // 'lastName' => ['required', 'string'],
            // 'pseudo' => ['string'],
            'name' => ['required', 'string', 'max:255'],
            // 'address' => ['string'],
            // 'codePost' => ['string'],
            // 'city' => ['string'],
            // 'phone' => ['string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ]
        ];
    }
}
