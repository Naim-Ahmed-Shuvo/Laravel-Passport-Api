<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function myCart()
    {
        $cart_products =  DB::table('carts')->where('user_id', Auth::id())->get();
        $total = $cart_products->sum('subtotal');
        return response()->json(["total" => $total,"products"=> $cart_products]);
    }
}
