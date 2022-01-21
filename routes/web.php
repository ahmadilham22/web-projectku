<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\DataCoronaController;


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
    return view('main', [
        'title' => 'Home'
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
            'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::resource('/dashboard/data', DashboardDataController::class);

Route::get('/dashboard/penduduk', [PendudukController::class, 'index']);
Route::get('/dashboard/add', [PendudukController::class, 'create']);
Route::post('/dashboard/store', [PendudukController::class, 'store']);
Route::get('/dashboard/{id}/edit', [PendudukController::class, 'edit']);
Route::put('/dashboard/update', [PendudukController::class, 'update']);
Route::get('/dashboard/{id}/delete', [PendudukController::class, 'destroy']);

Route::get('dashboard/corona', [DataCoronaController::class, 'index']);