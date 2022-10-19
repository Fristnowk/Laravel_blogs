<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index','BlogController@search');
Route::get('/login',function(){
    return view("login");
});
Route::post("/user/login","UserController@login");
Route::get("/user/loginoff","UserController@loginoff");
Route::get("/blog/search","BlogController@search");
Route::post("/blog/add","BlogController@add");
Route::get("/blog/del/{bid}","BlogController@del");
Route::get("/blog/mod/{bid}","BlogController@get");
Route::post("/blog/mod","BlogController@mod");


