<?php
namespace Waphp\Controller;
use Waphp\View\View;

class Controller{

	public $view;

	public function __construct()
  	{

  	}

	public function __destruct()
    {
    	$view = $this->view;

    	if ( $view instanceof View ) {
    		if(!empty($view->data))
    		{
    			extract($view->data);	
    		}
			
			require $view->view;
        }

     }

	



}