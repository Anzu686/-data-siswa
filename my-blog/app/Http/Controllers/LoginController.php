<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authen(Request $request){

       $seseorang= $request->validate([
            'email'=>'required',
            'password'=> 'required',
        ]);
        if(Auth::attempt($seseorang)){
            $request->session()->regenerate();
            return redirect()->intended('siswa');
        }
        return back()->with('err', 'Gagal Login.');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return to_route('login');
    }
}