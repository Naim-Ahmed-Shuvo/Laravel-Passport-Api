<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
class ProductController extends Controller
{
    public function allProduct()
    {
    	$products = Product::all();

    	return view('backend.products',compact('products'));
    }

    public function addProduct(Request $request)
    {
        if(isset($request->image)){
            $img_name = uniqid().'.'.$request->image->getClientOriginalExtension();

            Image::make($request->image)->resize(500,310)->save('product_img/'.$img_name);

             Product::insert([
            "cat_id"=> $request->cat_id,
            "name"=> $request->name,
            "details"=> $request->details,
            "price"=> $request->price,
            "image"=> 'product_img/'.$img_name,
            "size"=> $request->size,
            "color"=> $request->color,
            "stock_out"=> $request->stock_out,
            "hot_deal"=> $request->hot_deal,
            "buy_one_get_one"=> $request->buy_one_get_one,
        ]);
        }


        return back();
    }

    public function addToCart()
    {
        # code...
    }

 }
