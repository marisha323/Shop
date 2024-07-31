<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::with('images')->get();
        $categories = Category::all();
        //dd($categories);
        return view('welcome', compact('categories', 'products'));

    }

    public function showCategory($categoryId)
    {
        // Витягнути категорію разом з продуктами за ідентифікатором категорії
        $category = Category::with('products.images')->findOrFail($categoryId);

        $categories = Category::all();
        return view('product/category', compact('category','categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->with('images')
            ->get();
        $categories = Category::all();

        return view('welcome', compact('categories', 'products', 'query'));
    }
}
