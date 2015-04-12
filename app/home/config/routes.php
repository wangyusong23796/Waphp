<?php
use NoahBuscher\Macaw\Macaw as Routes;

Routes::get('/',"IndexController@index");




Routes::get("/hello",function(){
	echo 'say hello!';
});
