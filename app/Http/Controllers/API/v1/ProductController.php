<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct($productId)
    {
        $product = Product::find($productId);

        return response()->json($product);
        
    }
    public function latestProduct()
    {
        $product = Product::inRandomOrder()->get();
        return response()->json($product);
    }

}
