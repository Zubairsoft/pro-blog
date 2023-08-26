<?php

namespace App\Http\Requests\Admins;

use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookmarkRequest extends FormRequest
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
            'post_id' => [
                'required',
                'uuid',
                Rule::exists('posts', 'id')
            ]
        ];
    }

    public function updatingRules(): array
    {
        return [];
    }

    public function DeletionRules(): array
    {
        return [
            'ids' => [
                'array',
            ],
            'ids' => [
                'required',
                'uuid',
            ]
        ];
    }
}
