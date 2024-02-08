<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'stockInTransaction' , 'stockOutTransaction')->get();

        return response()->json([
            'products' => $products
        ], 200);
        
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_code' => ['required' , 'max:12'],
            'product_name' => ['required' , 'min:4'],
            'product_description' => ['required' , 'min:6'],
            'product_stock' => ['required'],
            'product_price' => ['required'],
            'product_category' => ['required']
        ]);

        $product = Product::create($request->all());

        $product->save();
        return response()->json([
            'message' => 'Create Product Successfull',
            'product' => $product
        ] , 201);
    }

    public function update(Request $request , $id)
    {
        $product = Product::findOrFail($id);

        if($product)
        {
            $product->update($request->all());

            return response()->json([
                'message' => 'Product Update Successfull',
                'product' => $product
            ], 200);
        }

        return response()->json([
            'message' => 'Something went wrong'
        ], 404);
    }

    public function destroy($id)
    {
        $product = Product::find($id);


        if($product)
        {
            $product->delete();
            return response()->json([
                'message' => 'Product delete'
            ], 200);
        }

        return response()->json([
            'message' => 'Something went wrong'
        ], 404);
        
    }
}
