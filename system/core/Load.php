<?php


class load{


	/*
	*	载入自定义类库和系统类库
	*	
	*
	*/
	
	public function library($class)
	{
		$url = APP_PATH.'/library/'.$class.'.php';
		
		if (file_exists($url))
		{
			# code...
			//用户自定义类
			require $url;
			return $this->$class = new $class();

		}
		$url = SYSTEM_PATH.'/library/'.$class.'.php';
		if (file_exists($url))
		{
			# code...
			//系统提供类函数
			require $url;
			return $this->$class = new $class();
		}

		 //throw new UnexpectedValueException("您要加载的类不存在");

	}

	/*
	*	载入自定义方法或者系统提供方法
	*	
	*
	*/

	public function helper($helper)
	{
		echo $helper;
	}


	
}