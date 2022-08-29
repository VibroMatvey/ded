<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function add (Request $request) {
        $data_id = $request->get('id');
        $data_qty = $request->get('qty');
        $id = response()->json(['id' => $data_id]);
        $qty = response()->json(['qty' => $data_qty]);

        return session()->push('cart', ['id' => $id, 'qty' => $qty]);
    }
}
