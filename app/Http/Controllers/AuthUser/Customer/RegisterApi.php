<?php

namespace App\Http\Controllers\AuthUser\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserAuth\Customer;
use Illuminate\Http\Request;

class RegisterApi extends Controller
{
     public function RegisterRequest(Request $request)
    {
       $a = new Customer();
       $a->name = $request->name;
       $a->name = $request->name;
       $a->name = $request->name;
       $a->name = $request->name;
       $a->name = $request->name;
       $a->name = $request->name;
    }
}
