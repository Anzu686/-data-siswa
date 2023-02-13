<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SiswaController;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





// Route::get('/jurusan/{jurusan:id}', function(Jurusan $jurusan){
//     return view ('jurusan.index',[
//         'jurusans'=>$jurusan::all(),
//         //dd($jurusan::all())
//         'siswas'=>$jurusan->siswa,
//         'jurusann'=>$jurusan->name
//     ]);
  
// })->name('jurusan');

Route::get('/registrasi',[RegistrasiController::class,'index']);
Route::post('/registrasi',[RegistrasiController::class,'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authen']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'UserAcces:admin'])->group(function () {
  
    Route::resource('/siswa', SiswaController::class);
});

Route::middleware(['auth', 'UserAcces:petugas'])->group(function () {
  
   
        Route::get('/jurusan/{jurusan:id}', function(Jurusan $jurusan){
            return view ('jurusan.index',[
                'jurusans'=>$jurusan::all(),
                //dd($jurusan::all())
                'siswas'=>$jurusan->siswa,
                'jurusann'=>$jurusan->name
            ]);
          
        })->name('jurusan');
});