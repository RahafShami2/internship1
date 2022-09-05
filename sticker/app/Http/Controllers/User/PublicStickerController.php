<?php
namespace App\Http\Controllers\User;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicStickerController extends Controller
{
    public function index(){
        return view('user.sticker');
    }
    //function to search the name of the sticker user needed 
    public function search(Request $request){
        return $request->input();
    }
}
