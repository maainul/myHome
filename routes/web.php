<?php

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
Route::get('/','WelcomeController@index');

Route::resource('homes','HomeController');

Route::get('/rents','RentController@index');
Route::get('/rents/create','RentController@create');
Route::post('/rents/create','RentController@store');

Route::resource('floors','FloorController');
Route::resource('offices','OfficeController');

Route::resource('renters','RenterController');
Route::get('renters/gender/{gender_id}', 'RenterController@getByGender');

Route::resource('rooms','RoomController');

Route::resource('ex_typs','ExpenseTypesController');

Route::resource('expenses','ExpenseController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
