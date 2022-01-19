<?php

namespace App\ViewModels\Admin\Products;

use App\ViewModels\Concerns\HasPaginator;
use App\ViewModels\ViewModel;
use Illuminate\Support\Str;
use NumberFormatter;

class IndexViewModel extends ViewModel
{
    use HasPaginator;

    protected function buttons(): array
    {
        return [
            'create' => [
                'text' => trans('admin.products.create'),
                'route' => trans('admin.products.create'),
            ]
        ];
    }

    protected function title(): string
    {
        return trans('admin.products.titles.index');
    }

    protected function data(): array
    {
        return [
            'products' => $this->collection->getCollection()->transform(function ($product) {
                $product->price = (new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY))->formatCurrency($product->price, config('app.currency'));
                $product->description = Str::limit($product->description);

                return $product;
            }),
        ];
    }
}
