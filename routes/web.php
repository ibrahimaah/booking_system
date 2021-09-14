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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['role:instructor']], function () {
    Route::get('/instructor','InstructorController@index');
});


Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student','StudentController@index');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin','AdminController@index');

    Route::get('/admin/floors-management','Admin\FloorController@index')->name('floors-management');
    Route::post('/admin/floors-management/remove/{id}','Admin\FloorController@destroy')->name('remove-floor');
    Route::post('/admin/floors-management/store','Admin\FloorController@store')->name('store-floor');

    Route::get('/admin/rooms-management/create-room','Admin\RoomController@create')->name('create-room');
    Route::get('/admin/rooms-management/edit-room/{id}','Admin\RoomController@edit')->name('edit-room');
    Route::post('/admin/rooms-management/update-room/{id}','Admin\RoomController@update')->name('update-room');
    Route::get('/admin/rooms-management','Admin\RoomController@index')->name('rooms-management');
    Route::post('/admin/rooms-management/store','Admin\RoomController@store')->name('store-room');
    Route::post('/admin/rooms-management/remove/{id}','Admin\RoomController@destroy')->name('remove-room');
});


Route::get('/register-instructor','Auth\RegisterInstructorController@showRegistrationForm');
Route::post('/register-instructor','Auth\RegisterInstructorController@register')->name('register-instructor');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin/users','Admin\UserController');
