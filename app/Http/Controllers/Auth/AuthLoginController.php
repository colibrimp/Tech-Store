<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Customers\Models\Customer;

class AuthLoginController extends Controller
{
    public function index(){
       
        return view('auth.login');
    }



    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            $success['token'] =  $user->createToken('LaMargaritaRestaurantApp')->accessToken;

            $success['last_name'] =  $user->last_name;

            return redirect($success, 'User login successfully.');

        } else {

            return redirect('/');
        }

    }





}
