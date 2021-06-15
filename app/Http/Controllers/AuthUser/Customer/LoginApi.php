<?php

namespace App\Http\Controllers\AuthUser\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserAuth\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginApi extends Controller
{



    public function LoginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = Customer::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
]);

       // return $user->createToken($request->email)->plainTextToken;
    }
}
