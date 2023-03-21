<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
  
    public function postProduct(Request $request)
    {
        try {

            $product = new Product();
            $product->company_id = Auth::user()->id;
            $product->name = $request->name;
            $product->current_price = floatval($request->current_price);
            $product->stock_left = intval($request->stock_left);
            $product->keywords = $request->keywords;
            $product->description_ar = $request->description_en;
            $product->description_fr = $request->description_en;
            $product->description_en = $request->description_en;
            $product->save();

            return response()->json([
                'message' => 'product added succesfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    
    public function postService(Request $request)
    {
        try {

            $service = new Service();
            $service->company_id = Auth::user()->id;
            $service->name = $request->name;
            $service->current_price = floatval($request->current_price);
            $service->keywords = $request->keywords;
            $service->description_ar = $request->description_en;
            $service->description_fr = $request->description_en;
            $service->description_en = $request->description_en;
            $service->save();

            return response()->json([
                'message' => 'service added succesfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAllProducts()
    {
        $products = Auth::user()->getProducts;
        return response()->json($products);
    }

    public function getAllServices()
    {
        $services = Auth::user()->getServices;
        return response()->json($services);
    }
}
