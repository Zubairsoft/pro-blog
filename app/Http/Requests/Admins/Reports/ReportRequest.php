<?php

namespace App\Http\Requests\Admins\Reports;

use Domains\Admins\Enums\ReportStatusEnum;
use Domains\Supports\Traits\Http\HttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
        return [];
    }

    public function updatingRules(): array
    {
        return [
            'ids' => [
                'required',
                'array'
            ],
            'ids.*' => [
                'required',
                'uuid',
                Rule::exists('reports', 'id')
            ],
            'status' => [
                'required',
                Rule::in(ReportStatusEnum::getKeys())
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
                'uuid',
                Rule::exists('reports', 'id')
            ]
        ];
    }
}
