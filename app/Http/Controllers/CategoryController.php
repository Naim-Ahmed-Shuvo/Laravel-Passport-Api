<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
       return view('backend.categories',compact('categories'));
    }

    public function categoriesAdd(Request $request)
    {
        Category::insert([
            "name"=> $request->cat_name
        ]);

        return back();
    }
}
