<?php

namespace Tests\Feature\Admin\Products\Concerns;

use Illuminate\Support\Str;

trait HasProductData
{
    /**
     * @throws \Exception
     */
    private function productData(): array
    {
        return [
            'name' => Str::random(10),
            'description' => Str::random(50),
            'price' => random_int(1, 1000),
            'quantity' => random_int(1, 1000),
        ];
    }
}
