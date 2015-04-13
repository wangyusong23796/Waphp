<?php


class Waphpinit{

	
	public static function Run()
	{
			require SYSTEM_PATH."/core/Route.php";
			/*在所有路由之前的钩子..*/



			//读取路由文件
			require APP_PATH.'/config/routes.php';



			require SYSTEM_PATH."/core/Controller.php";
			require SYSTEM_PATH."/core/View.php";
			require SYSTEM_PATH."/core/Model.php";
			require SYSTEM_PATH."/core/Load.php";

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