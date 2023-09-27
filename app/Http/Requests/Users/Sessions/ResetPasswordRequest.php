<?php

namespace App\Http\Requests\Users\Sessions;

use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
{
    use HttpRequest;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        'email' => [
                'required',
                'email',
                Rule::exists('users', 'email')
            ],
            'token' => [
                'required',
                'string',
                'max:255',
            ],
            'password' => [
                'required',
                'min:8',
                'max:32',
                'confirmed'
            ]
        ];
    }
}
