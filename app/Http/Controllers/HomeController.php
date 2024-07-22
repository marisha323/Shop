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
        //dd($products);
        return view('welcome', compact('categories', 'products'));

    }
}
