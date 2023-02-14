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
            'name'=>'required|min:3'
        ]);
        Jurusan::create(['name'=>$request->name]);

        return to_route('siswa.index')->with('succes', 'Jurusan Berhasil Ditambah');
    }

    public function edit_user(Request $request){


        $users = User::all();
        if($request->search){
            $users = User::where('name' , 'like', '%' . $request->search  .'%' )->get();
        };
       
        //
       
        return view ('admin.user.user', [
            'users'=>$users,
            'jurusans'=>Jurusan::all()
        ]);
    }
    
    public function update(User $user){
        return view ('admin.user.update', ['user'=>$user]);
    }
    
    public function update_user(Request $request, User $user){

        //dd($request);
        $this->validate($request,[
            'tipe'=>'required'
        ]);
        $user->update([
            "name" => $request->name,
            "tipe"=>$request->tipe
        ]);
        //dd($user);

        return to_route('user')->with('succes', 'data berhasil diubah');
    }
}
