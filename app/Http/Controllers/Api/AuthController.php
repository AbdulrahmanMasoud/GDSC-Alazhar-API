<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponsTrait;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    use ResponsTrait;

    public function login(LoginRequest $request){
     
        // 2- Check User
        $credentials = $request->validated(); // Get evrey thing validated from input
        $token =  Auth::guard('api')->attempt($credentials);

        // 3- if User Not Exist
        if(!$token){ 
            return $this->returnError('كلمه السر او البريد خطأ ',Response::HTTP_NOT_FOUND); 
        }

        // $user = Auth::guard('api')->user();
        // dd($user->isLeader());
       

        // 4- if User Exist
        $user = Auth::guard('api')->user();
        // $user->user_token = $token;
        return response()->json([
            'status'=>true,
            'role' =>$user->role->role,
            'msg'=>'تم تسجيل الدخول بنجاح',
            'user_token'=>$token,
        ],Response::HTTP_OK);
    }
}
