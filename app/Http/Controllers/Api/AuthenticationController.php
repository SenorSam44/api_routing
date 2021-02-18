<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registerIndex(){
        return view('auth.register');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        $validData= $request->validate([
            'name' =>'required|max:55',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);


//        $user= User::create($validData);
        $user = new User();
        $user->fill([
            'name' =>$validData['name'],
            'email'=>$validData['email'],
            'password'=>Hash::make($validData['password']),
        ]);
        $user->save();

        $accessToken=$user->createToken('access_token');

        return response()->json([
            'token_type'=>'Bearer',
            'access_token'=>$accessToken->accessToken,
            'user'=>$user,
            'expires_at' => Carbon::parse($accessToken->token->expires_at)->toDateTimeString(),
        ]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function loginIndex(){
        return view('auth.login');
    }


    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)){
            $user=auth()->user();
            $accessToken=$user->createToken('access_token');

            return response()->json([
                'token_type'=>'Bearer',
                'access_token'=>$accessToken->accessToken,
                'user'=>$user,
                'expires_at' => Carbon::parse($accessToken->token->expires_at)->toDateTimeString(),
            ]);
        }

        return response()->json(['error'=> 'Please try again'], 401);

    }
}
