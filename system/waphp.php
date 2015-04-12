<?php


use Illuminate\Database\Capsule\Manager as database;

//引入系统公用函数.
require SYSTEM_PATH."/common/Function.php";

// Autoload 自动载入
require ROOT_PATH."/vendor/autoload.php";

$capsule = new database;
$capsule->addConnection(require ROOT_PATH.'/config/database.php');
$capsule->bootEloquent();



//引入核心初始化类
require SYSTEM_PATH."/core/waphpinit.php";


//引入控制器
require SYSTEM_PATH."/core/Controller.php";
//引入model
require SYSTEM_PATH."/core/Model.php";
//引入视图
require SYSTEM_PATH."/core/View.php";





// 路由配置



require APP_PATH.'/config/routes.php';

Run();


