<?php

namespace App\Http\Controllers;

use App\Models\HistoryOrder;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('cart.cart', compact('cart', 'total','posts'));
    }

    public function add(Request $request)
    {
        $product = Product::with('images')->find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Add product to the cart with its details
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'images' => $product->images->map(function ($image) {
                    return [
                        'ImageUrl' => $image->ImageUrl,
                    ];
                })->toArray(),
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'product added to cart.');

    }


    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'product removed successfully');
    }


    public function show()
    {
        // Логика для отображения содержимого корзины
        return view('cart.cart');
    }
}
