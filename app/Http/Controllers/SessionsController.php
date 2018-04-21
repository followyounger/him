<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest',[
           'only' => ['create']
        ]);
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(Request $reuqest){
         $credentials = $this->validate($reuqest,[
            'email' => 'required|email|max:255',
            'password' => 'required'
         ]);

         if (Auth::attempt($credentials,$reuqest->has('remember'))) {
            if (Auth::user()->activated) {
                session()->flash('success','欢迎回来');
                return redirect()->intended(route('users.show',[Auth::user()]));
            } else {
                Auth::logout();
                session()->flash('warning','您的账号还未被激活，请您前去激活');
                return redirect('/');
            }


         } else {
             session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
             return redirect()->back();
         }
    }


    public function destroy(){
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('login');
    }
}
