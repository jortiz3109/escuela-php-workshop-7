<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Products\StoreProductAction;
use App\Actions\Admin\Products\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request, StoreProductAction $storeProductAction): RedirectResponse
    {
        $product = $storeProductAction->execute($request->validated(), new Product());

        return redirect()->route('admin.products.show', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $updateProductAction): RedirectResponse
    {
        $updateProductAction->execute($request->validated(), $product);

        return redirect()->route('admin.products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
