<?php

namespace App\Http\Controllers\Api\Customer\Auth;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User\UserResource;

class AuthController extends BaseController
{
    // Register API
    public function register(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }

        // Create user
        $requestData = $request->all();
        $requestData['is_user'] = 'customer';
        $requestData['password'] = Hash::make($request->password);

        $user = User::create($requestData);

        // Create token
        $token = $user->createToken('FoodSaveApp')->plainTextToken;

        return $this->sendResponse(new UserResource($user), 'User Register successfully ', ['token'=>$token]);
    }

    // Login API
    public function login(Request $request)
    {
        // Validate request
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'is_user' => 'customer', // additional condition
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('FoodSaveApp')->plainTextToken;

            return $this->sendResponse(new UserResource($user), 'User login successfully ', ['token'=>$token]);
        } else {
            return $this->sendError('Your credentials does not match.');
        }
    }

    //Logout APi
    public function logout(Request $request)
    {
        $user = $request->user();
        $request->user()->currentAccessToken()->delete();

        return $this->sendResponse([], 'Logout successfully.');
    }
}
