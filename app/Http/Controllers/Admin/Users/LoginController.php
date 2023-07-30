<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        // check tai khoan co khop vs data khong

        if(Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ], $request->input('remember'))){
            return redirect()->route('admin');
        }
        //Session::flash('error','Email hoac password khong dung');
       
        return redirect()->back();
        
        
        
        
    }
}