<?php 


use Waphp\Controller\Controller;
use Waphp\View\View;
use App\home\models\admin\Article;
use Waphp\Load\Load;
use Waphp\Db\Db;

class IndexController extends Controller{


	public function index()
	{
		
		//$db = Load::library('Db');
		//$db->query('select * form article');

    	$this->view = View::make('home')->with('title',Article::first());
    }
	
}


