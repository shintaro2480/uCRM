<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**4
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //バリデーション
        return[ 
            'name' => ['required', 'max:255'], 
            'memo' => ['required', 'max:255'], 
            'price' => ['required', 'numeric', 'min:0']
            ];
    }
}
