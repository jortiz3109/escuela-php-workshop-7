<?php

namespace Tests\Feature\Admin\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\Feature\Admin\Contracts\HasValidationTestsContract;
use Tests\Feature\Admin\Products\Concerns\HasProductData;
use Tests\Feature\Admin\Products\Concerns\HasValidationTests;
use Tests\TestCase;

class StoreProductTest extends TestCase implements HasValidationTestsContract
{
    use RefreshDatabase;
    use WithFaker;
    use HasProductData;
    use HasValidationTests;

    public function test_it_stores_a_product(): void
    {
        $data = [
            'name' => $this->faker->text(80),
            'description' => $this->faker->text(199),
            'price' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
        ];

        $response = $this->performAction($data);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('products', $data);
    }

    public function performAction(array $data): TestResponse
    {
        return $this->post('/admin/products', $data);
    }
}
