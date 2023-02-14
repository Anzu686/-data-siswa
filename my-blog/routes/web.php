<?php

use App\Http\Controllers\AdminMenu;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SiswaController;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\UserAccess;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create som;ething great!
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

Route::get('/registrasi',[RegistrasiController::class,'index'])->middleware('guest');
Route::post('/registrasi',[RegistrasiController::class,'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');;
Route::post('/login', [LoginController::class, 'authen']);
Route::post('/logout', [LoginController::class, 'logout']);


  
Route::resource('/siswa', SiswaController::class);



Route::get('/jurusan/{jurusan:id}', function(Jurusan $jurusan){
    return view ('jurusan.index',[
        'jurusans'=>$jurusan::all(),
        //dd($jurusan::all())
        'siswas'=>$jurusan->siswa,
        'jurusann'=>$jurusan->name
    ]);
  
})->name('jurusan');        

Route::middleware(['auth', 'userAccess:2'])->group(function () {
    Route::get('admin/addjurusan', [AdminMenu::class, 'add_jurusan']);
    Route::post('admin/addjurusan', [AdminMenu::class, 'store_jurusan']);
    //Route::post('/admin/updatepetugas', AdminMenu::class);
    Route::get('admin/user', [AdminMenu::class, 'edit_user'])->name('user');

    Route::get('admin/user/{user:id}',[AdminMenu::class, 'update'])->name('updateuse');
    Route::post('admin/user/{user:id}', [AdminMenu::class, 'update_user'])->name('updateuser');

});

