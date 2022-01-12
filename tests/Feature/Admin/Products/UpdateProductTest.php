<?php

namespace Tests\Feature\Admin\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\Feature\Admin\Contracts\HasValidationTestsContract;
use Tests\Feature\Admin\Products\Concerns\HasProductData;
use Tests\Feature\Admin\Products\Concerns\HasValidationTests;
use Tests\TestCase;

class UpdateProductTest extends TestCase implements HasValidationTestsContract
{
    use RefreshDatabase;
    use HasProductData;
    use HasValidationTests;

    private Model $product;

    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_it_updates_a_product(): void
    {
        $this->withoutExceptionHandling();

        $data = $this->productData();

        $response = $this->performAction($data);

        $this->product->refresh();

        $response->assertSessionHasNoErrors();
        $this->assertEquals($data['name'], $this->product->name);
        $this->assertEquals($data['description'], $this->product->description);
    }

    public function performAction(array $data): TestResponse
    {
        return $this->patch($this->route(), $data);
    }

    public function route(): string
    {
        return '/admin/products/' . $this->product->getRouteKey();
    }
}
