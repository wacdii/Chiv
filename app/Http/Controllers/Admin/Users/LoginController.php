<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.users.login',[
            'title'=>'Dang nhap he thong']);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=> 'required|email:filter',
            'password'=>'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ],$request->input('remember'))){
            return route('admin');
        }
    }
}
