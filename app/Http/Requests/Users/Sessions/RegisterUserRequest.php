<?php

namespace App\Http\Requests\Users\Sessions;

use Domains\Supports\Enums\GenderEnum;
use Domains\Supports\Enums\LocalEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
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
            'first_name' => [
                'required',
                'min:2',
                'max:50',
            ],
            'last_name' => [
                'required',
                'min:2',
                'max:50',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('authors'),
            ],
            'avatar' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024)
            ],
            'password' => [
                'required',
                Password::min(9)->numbers()->letters()->symbols(),
                'confirmed',
            ],
            'gender' => [
                'required',
                Rule::in(GenderEnum::getKeys())
            ],
            'local' => [
                Rule::in(LocalEnum::getValues())
            ]
        ];
    }
}
