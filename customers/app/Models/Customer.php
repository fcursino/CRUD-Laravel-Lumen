<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'customers';

    public $timestamps = true;

    public function getCustomerById($id) {
        return Customer::where('id', $id)->get();
    }
}
