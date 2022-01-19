<?php

namespace App\Actions\Admin\Products;

use App\Models\Product;

class StoreProductAction
{
    public function execute(array $data, Product $product): Product
    {
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->quantity = $data['quantity'];
        $product->save();

        return $product;
    }
}
