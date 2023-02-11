<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Models\Jurusan;

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



Route::resource('/siswa', SiswaController::class);

Route::get('/jurusan/{jurusan:id}', function(Jurusan $jurusan){
    return view ('jurusan.index',[
        'jurusans'=>$jurusan::all(),
        //dd($jurusan::all())
        'siswas'=>$jurusan->siswa,
        'jurusann'=>$jurusan->name
    ]);
  
})->name('jurusan');