<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //function when admin need to make logout of the admin panel ,and display the login page.
    public function store()
    {
        auth()->logout();
        return redirect()->route('/login');
        
    }
}
