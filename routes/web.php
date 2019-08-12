<?php

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

Route::get('table','PageCon@show');
Route::get('table/{page}','PageCon@onePagey');

Route::post('table/{page}/receiveNote','NoteCon@recNote');
Route::get('table/{page}/note-del','NoteCon@delNote');

Route::post('notes/{note}/update','NoteCon@update');
Route::get('notes/{note}/edit','NoteCon@edit');

Route::post('receivePage','PageCon@recPag');

Route::get('{pagex}/del','PageCon@delPag');
Route::get('{pagex}/delall','PageCon@delall');

