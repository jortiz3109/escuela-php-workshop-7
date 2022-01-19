<?php

namespace App\Http\Requests\Admin\Products;

class UpdateProductRequest extends StoreProductRequest
{
    public function rules(): array
    {
        return parent::rules();
    }
}
