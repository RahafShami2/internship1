<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class UserController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('layouts.user' ,compact('categories'));
    }
}
