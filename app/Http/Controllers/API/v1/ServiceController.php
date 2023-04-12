<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

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

            $services = Service::latest();
            foreach ($services as $index => $service) {
                $data['services'][$index] = [
                    'id' => $service->id,
                    'name' => $service->name,
                    'current_price' => floatval($service->current_price),
                    'keywords' => $service->keywords,
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
