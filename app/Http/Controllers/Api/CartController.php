<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $user_id = Auth::id();
        $checking = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id)->first();
        $product = Product::where('id', $id)->first();

        if ($checking) {
            $qty = $request->qty;
            $subtotal = $checking->price * $qty;
            DB::table('carts')->where('user_id', $user_id)->where('product_id', $id)->update([
                "qty" => $qty,
                "subtotal" => $subtotal
            ]);


            return response()->json(["message" => "qty & subtotal updated"]);
        }

        Cart::insert([
            "product_id" => $id,
            "user_id" => $user_id,
            "product_name" => $product->name,
            "price" => $product->price,
            "size" => $request->size,
            "qty" => $request->qty,
            "color" => $request->color,
            "subtotal" => $product->price * $request->qty
        ]);

        return response()->json([
            "message" => "product added to cart"
        ]);
    }

    public function removeCart($id)
    {
        DB::table('carts')->where("product_id", $id)->delete();

        return response()->json(["message" => "Product removed from cart"]);
    }

    public function flashCart()
    {
        $u_id = Auth::id();
        DB::table('carts')->where('user_id',$u_id)->delete();
        return response()->json(["message" => "cart flashed"]);
    }

    public function getCarts()
    {
       $cart_products =  DB::table('carts')->where('user_id',Auth::id())->get();
        return response()->json(["carts" => $cart_products]);
    }
}
