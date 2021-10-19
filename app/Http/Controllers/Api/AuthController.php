<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponsTrait;
use App\Http\Requests\Auth\LoginRequest;

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
            return $this->returnError('كلمه السر غير صحيحه',Response::HTTP_NOT_FOUND); 
        }

        if (Gate::allows('is-Leader')) { // If This User Is Admin
          
            return response()->json([
                'status'=>true,
                'msg'=>'You Are Login',
                "leader_token"=>$token
            ],200);
        }elseif(Gate::allows('is-Head')){
            
            return response()->json([
                'status'=>true,
                'msg'=>'You Are Login',
                "head_token"=>$token
            ],200);
        }
        elseif(Gate::allows('is-Member')){ // If This User Is Not Admin
           
            return response()->json([
                'status'=>true,
                'msg'=>'You Are Login',
                "member_token"=>$token
            ],200);
        }
        // 4- if User Exist
        // $user = Auth::guard('api')->user();
        // // $user->user_token = $token;
        // return response()->json([
        //     'status'=>true,
        //     'msg'=>'تم تسجيل الدخول بنجاح',
        //     'user_token'=>$token,
        // ],Response::HTTP_OK);
    }
}
