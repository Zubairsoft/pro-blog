<?php

namespace App\Http\Requests\Admins\Sessions;

use Domains\Supports\Enums\LocalEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterAdminRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:16'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email'),
            ],
            'avatar' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024)
            ],
            'password' => [
                'required',
                Password::min(9)->numbers()->letters()->symbols(),
                'confirmed',
            ],
            'local' => [
                Rule::in(LocalEnum::getValues())
            ]
        ];
    }
}
