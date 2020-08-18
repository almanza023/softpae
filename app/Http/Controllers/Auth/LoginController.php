<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['only'=>'mostrar']);
    }
   
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(){
        $credenciales=$this->validate(request(),[
            'usuario'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($credenciales)){
            return redirect()->route('home');
        }
        return back()->withErrors(['usuario'=>'Estas credenciales no coinciden con nuestros registros'])
        ->withInput(request(['usuario']));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
   
    
}
