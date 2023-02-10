<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();

        if(request('search')){
            $siswa=Siswa::all()->where('name', 'LIKE', '%' . request('search') . '%');
       }
        //
        return view('siswa.index', [
            'siswas'=>$siswa,
            'jurusans'=>Jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('siswa.create', [
            'jurusans'=>Jurusan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // $this->validate($request, [
        //     'image' => 'required|mimes:svg,jpg,png,|size:10000',
        //     'name'=>'required|min:3'
        // ]);

        $image=$request->file('image')->store('foto-siswa');

        Siswa::create([
            'image'=>$image,
            'nis'=>$request->nis,
            'name'=>$request->name,
            'jurusan_id'=>$request->jurusan_id
        ]);
        return to_route('siswa.index')->with('success', 'Data Berasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa, Jurusan $jurusan)
    {
        return view('siswa.edit', [
            'jurusans'=>$jurusan::all(),
            'siswa'=>$siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image->store('foto-siswa');

            $siswa->update([
                'image'=>$image,
                'nis'=>$request->nis,
                'name'=>$request->name,
                'jurusan_id'=>$request->jurusan_id
            ]);
        }
        else{
            $siswa->update([

                'nis' => $request->nis,
                'name' => $request->name,
                'jurusan_id' => $request->jurusan_id
            ]);

        }
         return to_route('siswa.index')->with('success', 'Data Berasil Di Tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
        Storage::delete('public/foto-siswa'. $siswa->image);

        $siswa->delete();

        return to_route('siswa.index')->with('success', 'Data Berasil Di hapus');
    }
}
