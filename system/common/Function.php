<?php
use NoahBuscher\Macaw\Macaw as Routes;

function Run()
{
	//在此处读取钩子..



	//注册视图

	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	//注册出错路由.
	Routes::$error_callback = function() {
	  throw new Exception("路由无匹配项 404 Not Found");
	};
	Routes::dispatch();
}



function C()
{


}
