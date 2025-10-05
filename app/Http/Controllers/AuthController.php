<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService){
    }
    public function login(LoginRequest $request){
     
        $user = User::where('email', $request->email)->first();
     
        $this->authService->checkCredentials($user,$request);

        return $this->success('',['token'=>$user->createToken($request->email)->plainTextToken]);
     
        return response()->json([
            'token'=>$user->createToken($request->email)->plainTextToken
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return $this->success('user logged out');
    }
    public function register(RegisterRequest $request){
        $data=$request->validated();
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        $user->assignRole('customer');

        if ($request->hasFile('photo')) {
            $path=$request->file('photo')->store('users/'.$user->id,'public');
            $user->photos()->create([
                'full_name'=>$request->file('photo')->getClientOriginalName(),
                'path'=>$path
            ]);
        }


        return $this->success('user created',
        ['token'=>$user->createToken($request->email)->plainTextToken]
    );
    }

    public function changePassword(){

    }

    public function user(Request $request){
        return response(new UserResource($request->user()));
    }
}
