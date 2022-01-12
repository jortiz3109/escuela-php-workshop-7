<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'min:5', 'max:80'],
            'description' => ['bail', 'required', 'string', 'min:10', 'max:255'],
            'price' => ['bail', 'required', 'numeric', 'integer', 'min:1'],
            'quantity' => ['bail', 'required', 'numeric', 'integer', 'min:1'],
        ];
    }
}
