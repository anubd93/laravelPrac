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
//    return "hello service engine";
});
//Route::get('/hello', function () {
//    return "hello service engine";
//});

//Route::get('/about', function (){
//    return view('pages.about');
//});
//Route::get('/about/user/{id}/{name}', function ($id, $name){
//    return 'User Name is: '.$name.' User ID is: '. $id;
//});

Route::get('/index', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/service', 'PageController@service');