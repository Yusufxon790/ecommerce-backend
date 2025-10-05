<?php

namespace App\Services;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthService extends Service
{
        /**
     * /
     * @param mixed $user
     * @param \App\Http\Requests\LoginRequest $request
     * @return void
     * @throws ValidationException
     */
    public function checkCredentials($user,LoginRequest $request){
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }
}