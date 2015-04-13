<?php


//不可用
class Db extends ezcDbHandler{

	public function __construct(){

		ezcDbFactory::addImplementation( 'mysql', 'Db' );
		$database =array(
        'dbname' => env('DB_HOST','127.0.0.1'),
        'user' => env('DB_DATABASE','root'),
        'pass' => env('DB_USERNAME','')
        );
    	$this->db   = ezcDbFactory::create( 'mysql', $database );
	}





}