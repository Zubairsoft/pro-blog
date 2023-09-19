<?php

namespace App\Http\Requests\Authors;

use Domains\Supports\Enums\GenderEnum;
use Domains\Supports\Enums\LocalEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProfileRequest extends FormRequest
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
                'min:3',
                'max:255'
            ],
            'last_name' => [
                'min:3',
                'max:255'
            ],
            'email' => [
                'email',
                Rule::unique('admins', 'email')
            ],
            'gender' => [
                Rule::in(GenderEnum::getValues())
            ],
            'password' => [
                'min:8',
                'max:32',
                'confirmed'
            ],
            'local' => [
                Rule::in(LocalEnum::getValues()),
            ],
            'avatar' => [
                File::types(['png', 'jpeg'])->max(2 * 1024)
            ]
        ];
    }
}
