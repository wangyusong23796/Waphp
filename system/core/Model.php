<?php namespace Waphp\Model;


use Illuminate\Database\Eloquent\Model as Orm_Model;

class Model extends Orm_Model{

	public function __construct()
	{
		parent::__construct();
		$this->timestamps = false;
	}
}