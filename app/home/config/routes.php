<?php

Route::get('/',"IndexController@index");


Route::get('/test',"TestController@index");



Route::get("/say","IndexController@index");

Route::post("/test","TestController@postindex");