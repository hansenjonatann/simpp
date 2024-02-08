<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('products')->get();

        return response()->json([
            'message' => 'List of Category',
            
            'categories' => $category
            ] , 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => ['required' , 'string'] ,

        ]);

        $category = Category::create($request->all());

        return response()->json([
            'message' => 'Category has been created',
            'category' => $category
        ], 201);
    }

    public function update(Request $request , $id)
    {
        
                $category = Category::findOrFail($id);
    
                

        if($category)
        {

            $validated = $request->validate([
                'category_name' => ['required']
            ]);
            
            
            if($validated) 
            {

            $category->update($request->all());

            return response()->json([
                'message' => 'Category Updated',
                'data' => $category
            ], 200);

            }

        }

        return response()->json([
            'message' => 'Something went wrong',
        ], 500);
    }
}
