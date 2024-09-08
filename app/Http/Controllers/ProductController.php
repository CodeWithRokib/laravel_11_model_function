<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products for listing
        $products = Product::where('status', 1)->paginate(10);
    
        // Get the total quantity of active products
        $totalQuantity = Product::totalActiveQuantity();
    
        return view('practice.product.index', compact('products', 'totalQuantity'));
    }
    public function create(){
        return view('practice.product.create');
    }
     /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();
            DB::beginTransaction();
            $product = Product::storeProduct($validatedData);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

        /**
     * Display the specified product.
     *
     * @param int $id
     * @return View
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
      /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $validatedData = $request->validated();
            DB::beginTransaction();
            Product::updateProduct($product, $validatedData);
            DB::commit();

            return redirect()->route('products.index')->with('success', 'Product updated successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }
      /**
     * Remove the specified product from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        try {
            Product::deleteProduct($product);
            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }

}
