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
require SYSTEM_PATH."/core/Waphpinit.php";

//初始化系统.
Waphpinit::Run();


