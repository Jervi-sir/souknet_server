<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    public function listCategories() 
    {
        $categories = Category::all();

        foreach($categories as $index => $category) {
            $data['categories'][$index] = [
                'id' => $category->id,
                'name' => $category->name
            ];
        }

        return response()->json([
            'categories' => $data['categories'],
        ]);
        
    }
}
