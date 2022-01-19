<?php

namespace Tests\Feature\Admin\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list_products(): void
    {
        $response = $this->get('/admin/products');

        $response->assertOk();
    }

    public function test_it_show_a_product_details():void
    {
        $product = Product::factory()->create();

        $response = $this->get('/admin/products');

        $response->assertSee($product->code);
    }
}
