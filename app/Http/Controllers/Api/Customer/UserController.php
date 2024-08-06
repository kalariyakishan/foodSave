<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    //User Update
    public function update(Request $request)
    {
        $user = $request->user();
        $requestData = $request->all();
        if ($request->hasFile('avatar')) {
            if ($user->avatar != '') {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            $requestData['avatar'] = $avatarName;
        }
        $user->update($requestData);
        return $this->sendResponse(new UserResource($user), "User updated successfully");
    }

    //User Details
    public function show(Request $request)
    {
        $user = $request->user();
        return $this->sendResponse(new UserResource($user), "User Details");
    }
    //user delete
    public function delete(Request $request)
    {
        $user = $request->user();
        $user->delete();
        return $this->sendResponse([], "Your Account deleted Successfully.");
    }
    //change password
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }
        $user = $request->user();
        // Check if the current password matches the old password
        if (!Hash::check($request->current_password, $user->password)) {
            return $this->sendError( 'The provided password does not match your current password.');
        }

        // Check if the new password is different from the current password
        if (Hash::check($request->new_password, $user->password)) {
            return $this->sendError('The new password cannot be the same as the current password.');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return $this->sendResponse([], 'Password changed successfully.');
    }
}
