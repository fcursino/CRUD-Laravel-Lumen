<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    public function login(Request $request) {
        $customer = Customer::getCustomerByEmail($request->email);

        if(!isset($customer)) {
            return response()->json(['status' => 'não autorizado'], 401);
        }
        
        if($request->password !== $customer->pluck('password')->first()) {
            // dd($customer->pluck('password')->first());
            return response()->json(['status' => 'não autorizado'], 401);
        }
        // dd($customer);
        $token = JWT::encode([
            'id' => $customer->pluck('id')->first(),
            'name' => $customer->pluck('name')->first(),
            'email' => $customer->pluck('email')->first(),
          ], env('JWT_SECRET'));

        return response()->json(['token' => $token, 'status' => 'autorizado']);
    }

   
}