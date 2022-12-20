<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

Route::get('/register', [UserController::class, 'viewRegisterForm'])->name('register_form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'viewLoginForm'])->name('login_form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/home', [UserController::class, 'viewHome'])->name('home');
Route::post('/fetch', [UserController::class, 'fetchData'])->name('fetch');

Route::get('/insert', [UserController::class, 'viewInsertForm'])->name('insert_form');
Route::post('/insert', [UserController::class, 'insertData'])->name('insert');

Route::get('/edit/{data}', [UserController::class, 'viewEditForm'])->name('edit_data_form');
Route::post('/edit', [UserController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [UserController::class, 'delete']);



