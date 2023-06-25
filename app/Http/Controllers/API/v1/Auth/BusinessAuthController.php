<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyPrivilege;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BusinessAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Auth :: loginCompany(), registerCompany(), logoutCompany()
    |--------------------------------------------------------------------------
    */
    public function loginCompany(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $business = Company::where('email', $request->email)->first();

            if (!$business || !Hash::check($request->password, $business->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $business->createToken('jervi', ['role:company'])->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function registerCompany(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $business = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'nature_business' => $request->nature_business,
                'address' => $request->location,
                'nif' => $request->nif,
                /*
                'ceo_name' => $request->ceo_name,
                'ceo_email' => $request->ceo_email,
                'activity_sector' => $request->activity_sector,
                'social_media' => $request->social_media, 
                */
                'company_privilege_id' => CompanyPrivilege::first()->id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $business->createToken('jervi', ['role:company'])->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logoutCompany(Request $request)
    {
        try {
            //$request->user()->tokens()->delete();
            auth()->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully logged out'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
