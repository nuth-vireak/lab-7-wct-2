<?php

use App\Http\Controllers\ContactController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(function () {
    return "<h1>Page not found</h1>";
});

Route::get('/',function(){
    return view('welcome');
});
Route::get('/contacts', [ContactController::class,'index']) -> name('contacts.index');
Route::get('/contacts/create', [ContactController::class,'create']) -> name('contacts.create');
Route::get('/contacts/{id}', [ContactController::class,'show']) -> name('contacts.show');

