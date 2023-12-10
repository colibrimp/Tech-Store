<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Customers\Models\Customer;

class AuthLogoutController extends Controller
{
    public function index(){
 
        return view('auth.login') . $this->function_alert();
    }

    //alert Logout successfully
    function function_alert() {
        $message = 'Logout successfully!';
        echo  "<script type='text/javascript'>alert('$message');</script>";
    }


    public function store(Request $request)
    {
        $request->user()->token()->revoke();
        return redirect('auth_login') ;


    }





}
