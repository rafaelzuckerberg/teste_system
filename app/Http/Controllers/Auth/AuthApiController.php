<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthApiController extends Controller
{    
    
    public function login(Request $request) 
    {
        $credentials = request(['email', 'password']);

        $validator = Validator::make($credentials, [
            'email'     =>  'required|email',
            'password'  =>  'required|min:6'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Wrong validation',
                'errors'    =>  $validator->errors()
            ], 422);
        } 

        // Everything was ok
        $token = JWTAuth::attempt($credentials);

        if($token) {
            return response()->json([
                'success'   =>  true,
                'token'     =>  $token,
                'user'      =>  User::where('email', $credentials['email'])->get()->first()
            ], 200);
        } else {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Wrong credentials',
                'errors'    =>  $validator->errors()
            ], 401);
        } 
    }


    public function refrshToken()
    {
        $token = JWTAuth::getToken();

        try {

            $token = JWTAuth::refresh($token);

            return response()->json([
                'success'   =>  true,
                'token'     =>  $token, 
            ], 200);
        } catch (TokenExpiredException $ex) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Need to login again please (expired)', 
            ], 422);
        } catch (TokenBlacklistedException $ex) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Need to login again please (balcklisted)', 
            ], 422);
        }
    } 


    public function logout()
    {
        $token = JWTAuth::getToken();

        try {

            JWTAuth::invalidate($token);

            return response()->json([
                'success'   =>  true,
                'message'   =>  'Logout successfully'
            ], 200);
        } catch (JWTException $ex) {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Logout fail'
            ], 422);
        }
    }


}
