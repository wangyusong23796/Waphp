<?php 
use Waphp\Controller\Controller;
use Waphp\View\View;

class TestController extends Controller{


	public function index()
	{
		$this->view = View::make('test');
	}
	public function postindex()
	{
		echo $this->input('hello',"post");
	}
}