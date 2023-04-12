<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct($id)
    {
        $product = Product::find($id);
        $data['product'] = [];
        $data['company'] = [];
        try {

            $data['product'] = [
                'id' => $product->id,
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
                'id' => $company->id,
                'name' => $company->name,
                'address' => $company->address,
                'city' => $company->city,
                'state' => $company->state,
                'zip_code' => $company->zip_code,
                'phone_number' => $company->phone_number,
                'website' => $company->website,
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 404);
        }

        return response()->json([
            'product' => $data['product'],
            'company' => $data['company'],
        ]);
    }
    public function latestProduct()
    {
        try {

            $products = Product::latest();
            foreach ($products as $index => $product) {
                $data['products'][$index] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'current_price' => floatval($product->current_price),
                    'stock_left' => intval($product->stock_left),
                    'keywords' => $product->keywords,
                    'description_ar' => $product->description_ar,
                    'description_fr' => $product->description_fr,
                    'description_en' => $product->description_en,
                ];
            }
            return response()->json([
                'products' => $data['products'],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function searchProduct($keywords)
    {
        try {

            $products = Product::inRandomOrder()->get();
            foreach ($products as $index => $product) {
                $data['products'][$index] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'current_price' => floatval($product->current_price),
                    'stock_left' => intval($product->stock_left),
                    'keywords' => $product->keywords,
                    'description_ar' => $product->description_ar,
                    'description_fr' => $product->description_fr,
                    'description_en' => $product->description_en,
                ];
            }
            return response()->json([
                'services' => $data['services'],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
