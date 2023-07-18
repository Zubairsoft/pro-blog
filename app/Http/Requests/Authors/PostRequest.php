<?php

namespace App\Http\Requests\Authors;

use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class PostRequest extends FormRequest
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
            'title_ar' => [
                'required',
                'min:3',
                'max:255',
            ],
            'title_en' => [
                'required',
                'min:3',
                'max:255',
            ],
            'description_ar' => [
                'required',
                'min:3',
                'max:1000',
            ],
            'description_en' => [
                'required',
                'min:3',
                'max:1000',
            ],
            'poster' => [
                'required',
                File::types('jpeg')->max(1024)
            ],
            'images' => [
                'array'
            ],
            'images.*' => [
                'required',
                File::types('jpeg')->max(1024)
            ],
            'is_published_ar' => [
                'boolean',
            ],
            'is_published_en' => [
                'boolean',
            ],
            'tags' => [
                'required',
                'array'
            ],
            'tags.*'=>[
                'required',
                Rule::exists('tags','id')
            ]
        ];
    }

    public function updatingRules(): array
    {
        return [
            'title_ar' => [
                'min:3',
                'max:255',
            ],
            'title_en' => [
                'min:3',
                'max:255',
            ],
            'description_ar' => [
                'min:3',
                'max:1000',
            ],
            'description_en' => [
                'min:3',
                'max:1000',
            ],
            'poster' => [
                File::types('jpeg')->max(1024)
            ],
            'images' => [
                'array'
            ],
            'images.*' => [
                'required',
                File::types('jpeg')->max(1024)
            ],
            'status' => [
                'boolean',
            ],
            'tags' => [
                'array'
            ],
            'tags.*'=>[
                Rule::exists('tags','id')
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
            'ids.*' => [
                'required',
                Rule::exists('posts', 'id')
            ]
        ];
    }
}
