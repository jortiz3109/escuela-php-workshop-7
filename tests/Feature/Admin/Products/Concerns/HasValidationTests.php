<?php

namespace Tests\Feature\Admin\Products\Concerns;

use Illuminate\Support\Str;

trait HasValidationTests
{
    /**
     * @return void
     * @dataProvider inputDataProvider
     */
    public function test_it_validates_input_data(string $field, array $data): void
    {
        $response = $this->performAction($data);

        $response->assertSessionHasErrors($field);
    }

    public function inputDataProvider(): array
    {
        return [
            'name is required' => ['field' => 'name' , 'data' => array_merge($this->productData(), ['name' => null])],
            'name is not a string' => ['field' => 'name' , 'data' => array_merge($this->productData(), ['name' => []])],
            'name is greater than 5 chars' => ['field' => 'name' , 'data' => array_merge($this->productData(), ['name' => 'asd'])],
            'name is less than 80 chars' => ['field' => 'name' , 'data' => array_merge($this->productData(), ['name' => Str::random(81)])],

            'description is required' => ['field' => 'description' , 'data' => array_merge($this->productData(), ['description' => null])],
            'description is not a string' => ['field' => 'description' , 'data' => array_merge($this->productData(), ['description' => []])],
            'description is greater than 5 chars' => ['field' => 'description' , 'data' => array_merge($this->productData(), ['description' => 'asd'])],
            'description is less than 80 chars' => ['field' => 'description' , 'data' => array_merge($this->productData(), ['description' => Str::random(256)])],

            'price is required' => ['field' => 'price' , 'data' => array_merge($this->productData(), ['price' => null])],
            'price is numeric' => ['field' => 'price' , 'data' => array_merge($this->productData(), ['price' => 'asdf'])],
            'price is integer' => ['field' => 'price' , 'data' => array_merge($this->productData(), ['price' => '1.3'])],
            'price is min 1' => ['field' => 'price' , 'data' => array_merge($this->productData(), ['price' => 0])],

            'quantity is required' => ['field' => 'quantity' , 'data' => array_merge($this->productData(), ['quantity' => null])],
            'quantity is numeric' => ['field' => 'quantity' , 'data' => array_merge($this->productData(), ['quantity' => 'asdf'])],
            'quantity is integer' => ['field' => 'quantity' , 'data' => array_merge($this->productData(), ['quantity' => '1.3'])],
            'quantity is min 1' => ['field' => 'quantity' , 'data' => array_merge($this->productData(), ['quantity' => 0])],
        ];
    }
}
