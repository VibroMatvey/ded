<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (empty($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
        }
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        $product = Product::where('id', $request->id)->first();

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'image' => $product->image,
            )
        ]);

        return response()->json(\Cart::getContent());
    }
}
