<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Characteristics;
use App\Models\Color;
use App\Models\DiscountProducts;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function products()
    {
        $categories = Category::all();
        $products = Product::with(['images'])
            ->latest()
            ->paginate(12);
        return view('products', compact('products', 'categories'));
    }

    public function show($id)
    {
        // Provide a default color, e.g., 'Black'
        $product = Product::with(['characteristics.size', 'characteristics.brand'])->findOrFail($id);
        $productImages = ProductImage::where('product_id', $product->id)->get();
        $colorProduct = ProductColor::where('product_id', $product->id)->get();

        $images = [];
        foreach ($productImages as $productImage) {
            $image = Image::findOrFail($productImage->image_id);
            $images[] = $image;
        }
        $mainImageUrl = $productImages->first()?->image->ImageUrl ?? '/images/shoe_icon.png';
        return view('product.show', compact('product', 'productImages', 'mainImageUrl', 'colorProduct'));
    }

    public function updateColor(Request $request, $itemName)
    {
        $request->validate([
            'color' => 'required|string|in:Black,Red,Blue',
        ]);

        $request->session()->put('selectedColor', $request->input('color'));
        return redirect()->route('product.show', ['itemName' => $itemName]);
    }

    public function index()
    {
        $products = Product::all();
//<<<<<<< HEAD
        return view('product.index-product', compact('products'));

//=======


//        return view('product/indexf', compact('products'));
//>>>>>>> origin/Front_end_and_Back_end_Marina
    }

    public function info($id)
    {
        $product = Product::with(['characteristics.size', 'characteristics.brand'])->findOrFail($id);
        $colorProduct = ProductColor::where('product_id', $product->id)->get();
        $productImages = ProductImage::where('product_id', $product->id)->get();
        $images = [];
        foreach ($productImages as $productImage) {
            $image = Image::findOrFail($productImage->image_id);
            $images[] = $image;
        }

        return view('product/info', compact('product', 'productImages', 'colorProduct'));
    }

    public function create_product()
    {
        $categories = Category::all();
        $characteristics = Characteristics::all();
        $discounts = DiscountProducts::all();
        $colors = Color::all();
        return view('product/create_product', compact('categories', 'characteristics', 'discounts', 'colors'));
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

        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'characteristics_id' => 'required|integer',
            'characteristics_color_id' => 'required|array', // Змінено для роботи з масивом кольорів
            'characteristics_color_id.*' => 'integer',
            'discount_products_id' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);


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
        foreach ($request->characteristics_color_id as $color_id) {
            ProductColor::create([
                'product_id' => $product->id,
                'color_id' => $color_id,
            ]);
        }
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
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('images', 'colors')->findOrFail($id);
        $categories = Category::all();
        $characteristics = Characteristics::all();
        $discounts = DiscountProducts::all();
        $colors = Color::all();
        return view('product/edit', compact('product', 'categories', 'characteristics', 'discounts', 'colors'));
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
            'new_colors' => 'nullable|array', // Змінено для роботи з масивом кольорів
            'new_colors.*' => 'integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        if (is_array($request->new_colors)) {
            foreach ($request->new_colors as $color_id) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color_id,
                ]);
            }
        }

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

    public function delete_image_products($productId, $photoId)
    {
        // Спробуємо знайти зв'язок між продуктом і фото
        $productPhoto = ProductImage::where('product_id', $productId)
            ->where('image_id', $photoId)
            ->first();

        if ($productPhoto) {
            // Видалити зв'язок
            $productPhoto->delete();
        }

        // Незалежно від наявності зв'язку, намагаємось видалити фото
        $image = Image::find($photoId);
        if ($image) {
            $image->delete(); // Видаляємо фото
            return response()->json(['success' => true]);
        }

        // Якщо фото не знайдено
        return response()->json(['success' => false, 'message' => 'Фото не знайдено.']);
    }
}
