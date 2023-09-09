<?php

namespace App\Http\Requests\Admins;

use Domains\Supports\Enums\GenderEnum;
use Domains\Supports\Enums\LocalEnum;
use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class AdminRequest extends FormRequest
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
        return $this->RegisterRequestRules($this->creationRules(), $this->updatingRules(), $this->DeletionRules());
    }


    public function creationRules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email'),
            ],
            'gender' => [
                'required',
                Rule::in(GenderEnum::getValues()),
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
            'avatar' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024),
            ],
            'is_active' => [
                Rule::in(['true', 'false', 1, 0, true, false])
            ],
            'local' => [
                'required',
                Rule::in(LocalEnum::getValues())
            ]
        ];
    }

    public function updatingRules(): array
    {
        return [
            'name' => [
                'min:3',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email'),
            ],
            'gender' => [
                Rule::in(GenderEnum::getValues()),
            ],
            'password' => [
                'min:8',
                'confirmed',
            ],
            'avatar' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024),
            ],
            'is_active' => [
                Rule::in(['true', 'false', 1, 0, true, false])
            ],
            'local' => [
                Rule::in(LocalEnum::getValues())
            ]
        ];
    }

    public function DeletionRules(): array
    {
        return [
            'ids' => [
                'required',
                'array',
            ],
            'ids.*' => [
                'required',
                'uuid',
            ],
        ];
    }
}