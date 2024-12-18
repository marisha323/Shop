<?php

namespace App\Http\Controllers;

use App\Models\HistoryOrder;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\json;

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

        $product = Product::with(['images', 'firstColor.color'])->find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']+= $request->quantity ?? 1;
        } else {
            // Add product to the cart with its details
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $request->quantity ?? 1,
                'price' => $product->price,
                'images' => $product->images->map(function ($image) {
                    return [
                        'ImageUrl' => $image->ImageUrl,
                    ];
                })->toArray(),
                'color' => $request->color ?? $product->firstColor && $product->firstColor->color,

            ];
        }
        session()->put('cart', $cart);


        return redirect()->back()->with('success', 'Product added to cart.');

    }


    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed successfully');
    }


    public function show()
    {
        // Логика для отображения содержимого корзины
        return view('cart.cart');
    }

    public function updateQuantity(Request $request,$id){
        if ($request->session()->has('cart')){
            $cart=$request->session()->get('cart');
            if (isset($cart[$id])){
                $cart[$id]['quantity']=$request->quantity;
                $request->session()->put('cart',$cart);
            }
        }
        return response()->json(['success'=>true,'total'=>$this->calculateTotal($request->session()->get('cart'))]);
    }
    public function calculateTotal($cart){
        $total=0;
        foreach ($cart as $item){
            $total+=$item['price']*$item['quantity'];
        }
        return $total;
    }
}

