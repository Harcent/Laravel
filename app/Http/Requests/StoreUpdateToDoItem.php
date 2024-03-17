<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateToDoItem extends FormRequest
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
                Rule::unique('to_do_items')->where('to_do_id', $this->id),
            ],
            'description' => [
                'min:5',
                'max:10000'
            ],
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH'){
            $rules['name'] = [
                'required', 
                'min:3',
                'max:255',
                Rule::unique('to_do_items')->where('to_do_id', $this->id)->ignore($this->item),
            ];
        }

        return $rules;
    }
}
