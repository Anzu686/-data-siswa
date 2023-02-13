<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index(){
        return view ('registrasi');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email:dns',
            'password'=> 'required',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        return to_route('login');
    }
}
