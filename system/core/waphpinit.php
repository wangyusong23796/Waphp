<?php


class Waphpinit{


	public static function autoload($className)
	{
		if(file_exists(APP_PATH.'/controllers/'.$className.".php")){
			require APP_PATH.'/controllers/'.$className.".php";
		}
		if (file_exists(APP_PATH.'/models/'.$className.".php")) {
			# code...
			require APP_PATH.'/controllers/'.$className.".php";
		}
	}

	public static function Run()
	{
			require SYSTEM_PATH."/core/Route.php";
			//读取路由文件
			require APP_PATH.'/config/routes.php';
			//在此处读取钩子..

			spl_autoload_register(array('Waphpinit','autoload'));
			require SYSTEM_PATH."/core/Controller.php";
			require SYSTEM_PATH."/core/View.php";
			require SYSTEM_PATH."/core/Model.php";

			//注册视图
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
			//注册出错路由.
			Route::$error_callback = function() {
			  throw new Exception("路由无匹配项 404 Not Found");
			};
			//设置配置环境.
			setenv();
			Route::dispatch();
	}

 



}