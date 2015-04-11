<?php

define("Waphp","1.0"); //定义框架版本.


define("ROOT_PATH",str_replace("\\","/",dirname(dirname(__FILE__)))); //定义网站跟目录

define("SYSTEM_PATH",ROOT_PATH."/system"); //定义网站框架目录.

define("PUBLIC_PATH",ROOT_PATH."./public"); //网站访问目录有访问权限的.

define("APP_PATH",ROOT_PATH."/app/home"); //定义网站目录.



require SYSTEM_PATH.'/waphp.php';


