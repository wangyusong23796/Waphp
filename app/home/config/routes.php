<?php

Route::get('/',"IndexController@index");


Route::get('/test',"TestController@index");

Route::get("/hello",function(){
	echo 'say hello!';
});
