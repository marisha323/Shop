<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Characteristics;
use App\Models\DiscountProducts;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product/index-product', compact('products'));

    }
    public function info($id)
    {
        $product = Product::with(['characteristics.size', 'characteristics.brand'])->findOrFail($id);
        $productImages = ProductImage::where('product_id', $product->id)->get();
        $images = [];
        foreach ($productImages as $productImage) {
            $image = Image::findOrFail($productImage->image_id);
            $images[] = $image;
        }

        return view('product/info', compact('product', 'productImages'));
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $url = url(Storage::url('images/image_product/фон5.jpg'));

        //echo asset('storage/images/image_product/фон5.jpg');
        $product = Product::create([
            'name' => $request->name,
            'count' => $request->count,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'characteristics_id' => $request->characteristics_id,
            'discount_products_id' => $request->discount_products_id,
        ]);
        //dd($request->file('images'));
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('images/image_product', 'public');
                $fullUrl = url(Storage::url($path));

                $image = Image::create([
                    'ImageUrl' => $fullUrl,
                ]);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_id' => $image->id,
                ]);
            }
        }

        return redirect()->route('product.index-product')->with('success', 'Продукт успішно доданий');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $characteristics = Characteristics::all();
        $discounts = DiscountProducts::all();
        return view('product/edit',compact('product','categories','characteristics','discounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Валідуючі дані
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'characteristics_id' => 'required|exists:characteristics,id',
            'discount_products_id' => 'required|exists:discount_products,id',
        ]);


        // Знаходження продукту за ID
        $product = Product::findOrFail($id);
//dd($product);
        // Оновлення продукту
        $product->name = $request->name;
        $product->count = $request->count;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->characteristics_id = $request->characteristics_id;
        $product->discount_products_id = $request->discount_products_id;
        $product->save();
        Log::info('Update method called');
        // Перенаправлення з повідомленням про успіх
        return redirect()->route('product.index-product')->with('success', 'Продукт успішно оновлено');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index-product')->with('success', 'Продукт успешно удален!');
    }
}
