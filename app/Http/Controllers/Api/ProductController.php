<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function allProducts()
    {
       $products = DB::table('products')->limit(3)->get();
       return response()->json($products);
    }

    public function singleProduct($id)
    {
        $product = DB::table('products')
                  ->join('categories','products.cat_id','=','categories.id')
                  ->select('products.*','categories.name as cat_name')
                  ->where('products.id',$id)
                  ->first();

        $color = explode(',',$product->color);
        $size = explode(',',$product->size);

        return response()->json([
            "product"=>$product,
            "color"=> $color,
            "size"=> $size
        ]);
    }

    public function addWishlist($id)
    {
       $user_id =  Auth::user()->id;
       $checking = Wishlist::where('user_id',$user_id)->where('product_id',$id)->first();

       if($checking){
        return response()->json([
            "message"=> "Product already exists"
        ]);
       }

       Wishlist::insert([
           "user_id"=> $user_id,
           "product_id"=> $id
       ]);

       return response()->json([
           "message"=> "Product successfully added to wishlist"
       ]);
    }
}
