<?php

namespace App\Actions\Admin\Products;

use App\Models\Product;

class UpdateProductAction extends StoreProductAction
{
    public function execute(array $data, Product $product): Product
    {
        return parent::execute($data, $product);
    }
}
