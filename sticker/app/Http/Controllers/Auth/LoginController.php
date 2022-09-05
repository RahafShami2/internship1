<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use  Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    //function to view admin login page
    public function index()
    {
        return view('auth.login');
    }
    //function to valdation admin login inputs and
    //to login the admin in the admin panel website  
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required','string'],
            'password' => ['required'],
        ]);
        $user = User::where('username' , '=' , $request->username)->first();
        if ($user){
            if(Hash::check($request->password, $user->password)){
               $request->session()->put('loginId', $user->id);
               return redirect('category');
            } else {
                return back()->with('fail', 'The password you’ve entered is incorrect.');
            }
        } else {
            return back()->with('fail','This admin is not registered.');
        }
    }
     //function to remember admin "username &passsword" by check 'remember user' 
     //the admin doesn't need to make login when he need to entre the admin panel website.
    public function remember($token,$remember=false){
        $this->token=$token;
        $this->store($token);
        if ($remember) $this->remember($token);
        return true;
    }
}
