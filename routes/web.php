<?php

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
    return 'My Contact App';
});

Route::fallback(function () {
    return "<h1>Page not found</h1>";
});

function getContacts(){
    return [
        1 => ['firstname' => 'Sok', 'lastname' => 'Dara', 'email'=>'dara@abc.com','phone'=>'092 293 234','address'=>'Phnom Penh', 'company'=>'ABC'],
        2 => ['firstname' => 'Sok', 'lastname' => 'Pisey', 'email'=>'pisey@abc.com','phone'=>'092 234 123','address'=>'Phnom Penh', 'company'=>'ABC'],
        3 => ['firstname' => 'Chan', 'lastname' => 'Ratha', 'email'=>'ratha@xyz.com','phone'=>'092 234 233','address'=>'Phnom Penh', 'company'=>'XYZ'],
        4 => ['firstname' => 'Kos', 'lastname' => 'Borey', 'email'=>'borey@mno.com','phone'=>'092 234 343','address'=>'Phnom Penh', 'company'=>'MNO'],
    ];
}
function getCompanies(){

    return [
        1 => ['name' => 'Company 1'],
        2 => ['name' => 'Company 2'],
    ];
}
Route::get('/contacts', function () {

    $contacts =getContacts();
    $companies =json_decode(json_encode(getCompanies()));

    return view('contacts.index',['contacts'=>$contacts,'companies' => $companies]);
})->name('contacts.index');

Route::get('/contacts/create', function () {

    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}', function ($id) {

    $contacts = getContacts();

    abort_if(!isset($contacts[$id]),404);

    $contact = $contacts[$id];

    return view('contacts.show')->with('contact',$contact);
})->name('contacts.show');

