<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\User;


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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{id}', [UserController::class, 'show']);
*/

Route::get('/login', [Login::class, 'index'])->name('login')->middleware('guest');
Route::post('/authentication', [Login::class, 'authentication']);


Route::group(['middleware' => ['auth']], function () {
  
    Route::post('/change-theme', [User::class, 'change_theme']);

    Route::get('/', [User::class, 'index']);
    Route::get('/dashboard', [User::class, 'index']);

    Route::get('/pendaftaran', [User::class, 'pendaftaran']);
    Route::get('/data-pmb/{id}', [User::class, 'data_pmb']);
    Route::get('/data-pmb-detail/{id}', [User::class, 'data_pmb_detail']);
    Route::get('/data-pmb-cetak/{id}', [User::class, 'data_pmb_cetak']);
    Route::get('/data-pmb-pdf/{id}', [User::class, 'data_pmb_pdf']);

    Route::get('/ubah-profil', [User::class, 'ubah_profil']);
    Route::post('/update-profil', [User::class, 'update_profil']);


    Route::post('/logout', [Login::class, 'logout']);
});


