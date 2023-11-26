<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseResponseApiController as BaseResponseApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;

class PassportAuthController extends BaseResponseApiController
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('TechStoreApp')->accessToken;
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login
     */

    public function login(Request $request)
    {
        $input = $request->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {

            $user = Auth::user();

            $success['token'] =  $user->createToken('TechStoreApp')->accessToken;

            return $this->sendResponse($success, 'User login successfully.');

        } else {

            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }


    public function userDetails()
    {
        $user = Auth::guard('api')->user();
        return  $this->sendResponse($user, 'User Details successfully.');

    }

}
