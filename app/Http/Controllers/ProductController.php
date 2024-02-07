<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return response()->json([
            'products' => $products
        ], 200);
        
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_name' => ['required' , 'min:4'],
            'product_description' => ['required' , 'min:6'],
            'product_quantity' => ['required'],
            'product_category' => ['required']
        ]);

        $product = Product::create($request->all());

        $product->save();
        return response()->json([
            'message' => 'Create Product Successfull',
            'product' => $product
        ] , 201);
    }
}
