<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    function showService($id)
    {
        $service = Service::find($id);
        $data['product'] = [];
        $data['service'] = [];
        try {
            $data['service'] = [
                'id' => $service->id,
                'name' => $service->name,
                'current_price' => floatval($service->current_price),
                'keywords' => $service->keywords,
                'images' => $service->images,
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
                'images' => $company->images,
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 404);
        }
        return response()->json([
            'service' => $data['service'],
            'company' => $data['company'],
        ]);
    }

    public function latestService()
    {
        try {

            $data['services'] = [];
            $services = Service::latest()->get();
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

    public function searchService($keywords)
    {
        try {

            $services = Service::inRandomOrder()->get();
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

    public function latestServiceSubCategory($subId)
    {
        try {
            $subCategory = SubCategory::find($subId);
            $services = $subCategory->services->latest();
            foreach ($services as $index => $service) {
                $data['services'][$index] = [
                    'id' => $service->id,
                    'name' => $service->name,
                    'current_price' => floatval($service->current_price),
                    'stock_left' => intval($service->stock_left),
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
}
