<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function showService($serviceId)
    {
        $service = Service::find($serviceId);

        return response()->json($service);
    }

    public function latestService()
    {
        $service = Service::inRandomOrder()->get();
        return response()->json($service);
    }

}
