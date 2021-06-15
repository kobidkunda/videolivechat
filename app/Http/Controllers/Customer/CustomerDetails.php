<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDetails extends Controller
{


    public function GetProfile(Request $request){

        return $request->user();
     //   return 'll';

    }
}
