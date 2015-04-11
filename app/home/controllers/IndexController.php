<?php 


use Waphp\Controller\Controller;
use Waphp\View\View;
use App\home\models\Article;

class IndexController extends Controller{


	public function index()
	{


    	$this->view = View::make('home')->with('title',Article::first());
    }
	
}


