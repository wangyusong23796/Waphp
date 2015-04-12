<?php



return[
  'driver'    => 'mysql',
  'host'      => env('DB_HOST','localhost'),
  'database'  => env('DB_DATABASE','waphp'),
  'username'  => env('DB_USERNAME','root'),
  'password'  => env('DB_HOST',''),
  'charset'   => env('DB_CHARSET','utf8'),
  'collation' => 'utf8_general_ci',
  'prefix'    => env('DB_PREFIX','')
];