<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Products\StoreProductAction;
use App\Actions\Admin\Products\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Product;
use App\ViewModels\Admin\Products\IndexViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(IndexViewModel $indexViewModel): View
    {
        return view('admin.products.index', $indexViewModel->collection(Product::paginate()));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request, StoreProductAction $storeProductAction): RedirectResponse
    {
        $product = $storeProductAction->execute($request->validated(), new Product());

        return redirect()->route('admin.products.show', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction): RedirectResponse
    {
        $updateProductAction->execute($request->validated(), $product);

        return redirect()->route('admin.products.show', $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
