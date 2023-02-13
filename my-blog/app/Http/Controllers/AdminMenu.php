<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\User;

class AdminMenu extends Controller
{
    //
    public function add_jurusan(){
        return view('admin.jurusan' ,['jurusans'=>Jurusan::all()]);
    }

    public function store_jurusan(Request $request){
        $this->validate($request,[
            'name'=>'require|min:3'
        ]);
        Jurusan::create(['name'=>$request->name]);

        return to_route('siswa.index')->with('succes', 'Jurusan Berhasil Ditambah');
    }

    public function edit_user(){
        return view ('admin.user.user', ['users'=>User::all(),'jurusans'=>Jurusan::all()]);
    }

    public function update_user(Request $request, User $user){
        

        $user->update([
            'type' => $request->type,
        ]);

        return to_route('admin.user.user')->with('succes', 'data berhasil diubah');
    }

    public function update(User $user){
        return view ('admin/user/update', ['user'=>$user]);
    }
}
