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
//         Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|email',
//             '>email_verified_at' => 'required|email_verified_at',
//             'password' => 'required',
            
//         ]);
        
        
//         $user = new User();
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->email_verified_at = $request->email_verified_at;
//         $user->password = bcrypt($request->password);
// //        dd($user);
//         $user->save();

//        if ($user->email === $user->email_verified_at) {
//            //continue
//        } else {
//            return sendError('Emails does not match');
//        }


// Validator::make($request->all(), [
//     'name' => 'required',
//     'email' => 'required|email',
//     'email_verified_at' => 'required|same:email',
//     'password' => 'required',
    
// ]);



// $input = $request->all();

// $input['password'] = bcrypt($input['password']);

// $user = User::create($input);

//         return redirect('register')->with('status','Register added successfully!');
//     }
}



