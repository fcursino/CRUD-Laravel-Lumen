<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function listar_customers() {
        $customers = DB::table('customers')->get();
        return $customers;
    }

    public function listar_customer($customer_id) {
        $customer = Customer::getCustomerById($customer_id);
        return $customer;
    }

    public function criar_customer(Request $request) {
        DB::table('customers')
        ->insert([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return response()->json(['status' => 'ok'], 200);
    }

    public function atualizar_customer(Request $request) {
        DB::table('customers')
        ->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return response()->json(['status' => 'ok'], 200);
    }

    public function excluir_customer($customer_id) {
        DB::table('customers')
        ->where('id', $customer_id)
        ->delete();
        return response()->json(['status' => 'ok'], 200);
    }
}