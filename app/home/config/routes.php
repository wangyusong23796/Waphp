<?php

Route::get('/',"IndexController@index");


Route::get('/test',"TestController@index");



Route::get("/say","admin\IndexController@index");

Route::post("/test","TestController@postindex",['hook'=>'hookname']);

// Route::group(['hook'=>'hookname'],function(){
// 	Route::get("/say","admin\IndexController@index");
	

// });