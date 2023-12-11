<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Customers\Models\Customer;

class AuthRegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable|string
     *
     */

    public function create()
    {
        $users = User::all();
        return view('users::create', [
            'users' => $users,
            

        ]);
    }

    public function store(Request $request)
    {


        return redirect('register')->with('status','Register added successfully!');
    }
}



