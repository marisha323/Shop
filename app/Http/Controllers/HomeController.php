<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function generateReferralLink(User $user)
    {
        return url('/register?referral_code=' . $user->referral_code);
    }

    public function showReferralLink()
    {
        $user = Auth::user();
        $referralLink = (new HomeController)->generateReferralLink($user);

        return view('some-view', ['referralLink' => $referralLink]);
    }

//        public function index()
//    {
//        $products = Product::with('images')->get();
//        $categories = Category::all();
//
//        $user = Auth::user();
//        $referralLink = (new HomeController)->generateReferralLink($user);
//        //dd($products);
//        return view('welcome', compact('categories', 'products', 'referralLink'));
//
//    }
    public function index()
    {
        $products = Product::with('images')->get();
        $categories = Category::all();

        $user = Auth::user();

        // Проверяем, аутентифицирован ли пользователь
        if ($user) {
            $referralLink = $this->generateReferralLink($user);
        } else {
            $referralLink = null; // или какое-то значение по умолчанию
        }

        return view('welcome', compact('categories', 'products', 'referralLink'));
    }
    public function information()
    {
        $products = Product::with('images')->get();
        $categories = Category::all();

        $user = Auth::user();
        $referralLink = (new HomeController)->generateReferralLink($user);
        //dd($products);
        return view('information', compact('categories', 'products', 'referralLink'));

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
