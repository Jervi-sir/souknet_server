<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function getPostProduct()
    {
        try {
            return response()->json('success');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
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
            $category = Category::find(2);
            $product = new Product();
            $product->company_id = Auth::user()->id;
            $product->name = $request->name;
            $product->current_price = floatval($request->current_price);
            $product->stock_left = intval($request->stock_left);
            $product->keywords = $request->keywords;
            $product->description_ar = $request->description_ar;
            $product->description_fr = $request->description_fr;
            $product->description_en = $request->description_en;
            $product->category_id = $category->id;
            $product->sub_category_id = $category->subCategories()->inRandomOrder()->first()->id;
            $product->save();

            $string = preg_replace('/\s+/', '', $request->images);
            $imagesArray = explode(',', $string);

            foreach ($imagesArray as $url) {
                $image = new ProductImage();
                $image->product_id = $product->id;
                $image->url = $url;
                $image->meta_keywords = $request->name;
                $image->save();
            }
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




    public function getAllMyProducts()
    {
        try {

            $products = Auth::user()->products;
            foreach ($products as $index => $product) {
                $data['products'][$index] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'current_price' => floatval($product->current_price),
                    'stock_left' => intval($product->stock_left),
                    'images' => $product->images,
                    'keywords' => $product->keywords,
                    'description_ar' => $product->description_ar,
                    'description_fr' => $product->description_fr,
                    'description_en' => $product->description_en,
                ];
            }
            return response()->json([
                'products' => $data['products']
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    public function getThisProduct($id)
    {
        try {

            $product = Product::find($id);
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

            return response()->json([
                'product' => $data['product'],
                'company' => $data['company'],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteThisProduct($id)
    {
        try {

            $product = Product::find($id);
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getPostService()
    {
        try {
            return response()->json('this is add service page, will send data once m sure what are they');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function postService(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );

        try {

            $category = Category::find(1);
            $service = new Service();
            $service->company_id = Auth::user()->id;
            $service->name = $request->name;
            $service->current_price = floatval($request->current_price);
            $service->keywords = $request->keywords;
            $service->description_ar = $request->description_en;
            $service->description_fr = $request->description_en;
            $service->description_en = $request->description_en;
            $service->category_id = $category->id;
            $service->sub_category_id = $category->subCategories()->inRandomOrder()->first()->id;
            $service->save();

            return response()->json([
                'message' => 'service added succesfully',
                'service_id' => $service->id
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getThisService($id)
    {
        try {

            $service = Service::find($id);
            $data['service'] = [
                'id' => $service->id,
                'name' => $service->name,
                'current_price' => floatval($service->current_price),
                'keywords' => $service->keywords,
                'description_ar' => $service->description_ar,
                'description_fr' => $service->description_fr,
                'description_en' => $service->description_en,
            ];

            $company = $service->company;

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

            return response()->json([
                'service' => $data['service'],
                'company' => $data['company'],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteThisService($id)
    {
        try {

            $service = Service::find($id);
            $service->delete();
            return response()->json([
                'message' => 'Service deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAllMyServices()
    {
        try {

            $services = Auth::user()->services;
            foreach ($services as $index => $service) {
                $data['services'][$index] = [
                    'id' => $service->id,
                    'name' => $service->name,
                    'current_price' => floatval($service->current_price),
                    'keywords' => $service->keywords,
                    'images' => $service->images,
                    'description_ar' => $service->description_ar,
                    'description_fr' => $service->description_fr,
                    'description_en' => $service->description_en,
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

    public function archiveThisProduct($id)
    {
        try {

            $product = Auth::user()->products->find($id);
            $product->status = 0;
            return response()->json([
                'message' => 'Product archived successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function activateThisProduct($id)
    {
        try {

            $product = Auth::user()->products->find($id);
            $product->status = 1;
            return response()->json([
                'message' => 'Product activated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
