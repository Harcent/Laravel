<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateToDo extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required', 
                'min:3',
                'max:255',
                'unique:to_dos',
            ],
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH'){
            $rules['name'] = [
                'required', 
                'min:3',
                'max:255',
                Rule::unique('to_dos')->ignore($this->id ?? $this->to_do),
            ];
        }

        return $rules;
    }
}
