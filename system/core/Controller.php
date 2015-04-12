<?php
namespace Waphp\Controller;
use Waphp\View\View;



class Controller{

      public $view;
      public $load;


      public function __construct()
      {
        // $this->load = new Waphpinit();
      }

      public function __destruct()
      {
         $view = $this->view;

        if ($view instanceof View) {

          if(!empty($view->data))
          {
             extract($view->data);	
          }

            require $view->view;
        }

      }



      /*
      *
      *  获取数据
      *
      */
      public function input($value,$target=null)
      {
        switch ($target) {
          case 'get':
              if(C('xss')) {
                # code...
                return RemoveXSS($_GET[$value]);
              }else{
                 return $_GET[$value];
              }
            # code...
            break;
          case 'post':
              if(C('xss')) {
                # code...
                return RemoveXSS($_POST[$value]);
              }else{
                return $_POST[$value];
              }
              break;
          case 'session':
              if(C('xss')) {
                # code...
                return RemoveXSS($_SESSION[$value]);
              }else{
                return $_SESSION[$value];
              }
              break;
          default:
            # code...
              if(C('xss')) {
                  # code...
                  return RemoveXSS($_REQUEST[$value]);
              }else{
                  return $_REQUEST[$value];
              }
            break;
        }

      }






}