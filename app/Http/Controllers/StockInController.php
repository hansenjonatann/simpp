<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index() 
    {
        $stockIns = StockIn::with('products')->get();

        return response()->json([
            'data' => $stockIns
        ], 200);
    }
}
