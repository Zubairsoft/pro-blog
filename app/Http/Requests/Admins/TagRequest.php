<?php

namespace App\Http\Requests\Admins;

use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
            'name_ar' => [
                'required',
                'min:2',
                'max:16',
            ],
            'name_en' => [
                'required',
                'min:2',
                'max:16',
            ],
            'is_active' => [
                'boolean'
            ]
        ];
    }

    public function updatingRules(): array
    {
        return [
            'name_ar' => [
                'min:2',
                'max:16',
            ],
            'name_en' => [
                'min:2',
                'max:16',
            ],
            'is_active' => [
                'boolean'
            ]
        ];
    }

    public function DeletionRules(): array
    {
        return [
            'ids' => [
                'required',
                'array'
            ],
            'ids.*' => ['required', Rule::exists('tags', 'id')],
        ];
    }
}
