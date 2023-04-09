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
    public function getPostProduct()
    {
        return response()->json('success');
    }

    public function postProduct(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'passcurrent_priceword' => 'required',
                'stock_left' => 'required'
            ]
        );
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
                'product_id' => $product->id,
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

    public function getThisProduct($id)
    {
        $product = Product::find($id);
        $data['product'] = [
            'name' => $product->name,
            'current_price' => floatval($product->current_price),
            'stock_left' => intval($product->stock_left),
            'keywords' => $product->keywords,
            'description_ar' => $product->description_ar,
            'description_fr' => $product->description_fr,
            'description_en' => $product->description_en,
        ];

        $company = $product->company;

        $data['company'] = [
            'name' => $company->name,
            'address' => $company->address,
            'city' => $company->city,
            'state' => $company->state,
            'zip_code' => $company->zip_code,
            'phone_number' => $company->phone_number,
            'website' => $company->website,
        ];

        return response()->json([
            'product' => $data['product'],
            'company' => $data['company'],
        ]);
    }
}
