<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\customers1;
use App\Models\customers1s;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class authController extends Controller
{
    //
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        $user = Customer::where('nama', $request->nama)->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'gagal',
            ]);
        }

        $token = $user->createToken('auth_token');

        return response()->json([
            'data'=>$user,
            'status'=>true,
            'message'=>'Login Berhasil',
            'access_token' => $token,
            //'type' => 'bearer',
        ]);
    }
}
