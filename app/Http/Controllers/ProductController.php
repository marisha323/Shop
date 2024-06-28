<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Characteristics;
use App\Models\DiscountProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product/index');
    }
    public function create_product()
    {
        $categories = Category::all();
        $characteristics = Characteristics::all();
        $discounts = DiscountProducts::all();
        return view('product/create_product', compact('categories', 'characteristics', 'discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'characteristics_id' => 'required|integer',
            'discount_products_id' => 'required|integer',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Продукт успішно доданий');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
