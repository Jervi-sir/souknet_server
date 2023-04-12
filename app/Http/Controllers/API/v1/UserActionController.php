<?php

namespace App\Http\Controllers\API\v1;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserActionController extends Controller
{
    public function test()
    {
        return response()->json('succc');
    }

    public function followCompany($id)
    {
        try {
            $company = Company::find($id);
            Auth::user()->companiesFollowing()->attach($company->id);

            return response()->json([
                'message' => 'followed successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Already Following'
            ], 404);
        }
    }

    public function unFollowCompany($id)
    {
        try {
            $company = Company::find($id);
            Auth::user()->companiesFollowing()->detach($company->id);

            return response()->json([
                'message' => 'unFollowed successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'user is not Following this Company'
            ], 404);
        }
    }

    public function followNewsletter($id)
    {
        return response()->json($id);
    }

    public function unFollowNewsletter($id)
    {
        return response()->json($id);
    }

    public function favoriteThisProduct($id)
    {
        try {
            $product = Product::find($id);
            Auth::user()->favoriteProducts()->attach($product->id);
            return response()->json([
                'message' => 'product added to favorites list',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'cannot add, or its already in favorites list'
            ], 404);
        }
    }

    public function unFavoriteThisProduct($id)
    {
        try {
            $product = Product::find($id);
            Auth::user()->favoriteProducts()->detach($product->id);
            return response()->json([
                'message' => 'product is removed favorites list',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'cannot remove, or its already removed from favorites list'
            ], 404);
        }
    }

    public function favoriteThisService($id)
    {
        try {
            $service = Service::find($id);
            Auth::user()->favoriteServices()->attach($service->id);
            return response()->json([
                'message' => 'Service added to favorites list',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'cannot add, or its already in favorites list'
            ], 404);
        }
    }

    public function unFavoriteThisService($id)
    {
        try {
            $service = Service::find($id);
            Auth::user()->favoriteServices()->detach($service->id);
            return response()->json([
                'message' => 'Service is removed favorites list',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'cannot remove, or its already removed from favorites list'
            ], 404);
        }
    }


    public function orderThisProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $order = new Order();
            $order->product_id = $product->id;
            $order->user_id = Auth::user()->id;
            $order->quantity = $request->quantity;
            $order->ordered_price = $request->ordered_price;
            $order->destination = $request->destination;
            $order->order_status = $request->order_status;
            $order->location = $request->location;
            $order->save();

            return response()->json([
                'message' => 'Order created successfully',
                'order' => [
                    'id' => $order->id,
                    'quantity' => $order->quantity,
                    'ordered_price' => $order->ordered_price,
                    'order_status' => $order->order_status,
                    'location' => $order->location,
                    'destination' => $order->destination,
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'error during order'
            ], 404);
        }
    }


    public function getMyOrders()
    {
        $orders = Auth::user()->orders;
        return response()->json([
            'message' => 'user orders list',
            'orders' => $orders
        ]);
    }

    public function getThisOrder($id)
    {
        $orders = Auth::user()->orders->find($id);
        return response()->json([
            'message' => 'user this order',
            'orders' => $orders
        ]);
    }

    public function getMyFavoriteProducts()
    {
        $products = Auth::user()->favoriteProducts;
        return response()->json([
            'message' => 'user s favorite products',
            'products' => $products
        ]);
    }

    public function getThisFavoriteProduct($id)
    {
        $product = Auth::user()->favoriteProducts->find($id);
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
            'message' => 'user s favorite product',
            'product' => $data['product'],
            'company' => $data['company']
        ]);
    }

    public function getMyFavoriteServices()
    {
        $service = Auth::user()->favoriteServices;
        return response()->json([
            'message' => 'user s favorite service',
            'service' => $service
        ]);
    }

    public function getThisFavoriteService($id)
    {
        $service = Auth::user()->favoriteServices->find($id);
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
            'message' => 'user s favorite service',
            'service' => $data['service'],
            'company' => $data['company']
        ]);
    }

    public function getMyNotifications()
    {
        return response()->json([
            'message' => 'setup not yet',
        ]);
    }

    public function getThisNotifications($id)
    {
        return response()->json([
            'message' => 'setup not yet',
        ]);
    }

    public function bookService(Request $request, $id)
    {
        $service = Service::find($id);
        $book = new Booking();
        $book->user_id = Auth::user()->id;
        $book->service_id = $service->id;
        $book->date = Carbon::parse($request->date);        //2023-03-31
        $book->subject = $request->subject;
        $book->message = $request->message;
        $book->save();

        return response()->json([
            'message' => 'appoitment booked successfully',
            'book' => [
                'service_id' => $service->id,
                'service_name' => $service->name,
                'date' => $book->date,
                'subject' => $book->subject,
                'message' => $book->message,
            ]
        ]);
    }

    public function unBookService($id)
    {
        $book = Booking::find($id);
        $book->delete();
        return response()->json([
            'message' => 'canceled booking successfully'
        ]);
    }

    public function addReviewProduct($id)
    {
        $product = Product::find($id);
    }
}
