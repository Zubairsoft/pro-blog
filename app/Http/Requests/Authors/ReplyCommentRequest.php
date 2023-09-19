<?php

namespace App\Http\Requests\Authors;

use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;


class ReplyCommentRequest extends FormRequest
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
            'reply' => [
                'required',
                'min:1',
                'max:255'
            ]
        ];
    }

    public function updatingRules(): array
    {
        return [
            'reply' => [
                'min:1',
                'max:255',
            ]
        ];
    }

    
    public function DeletionRules(): array
    {
        return [
            'ids' => [
                'array',
            ],
            'ids.*' => [
                'required',
                'uuid'
            ]

        ];
    }
}
