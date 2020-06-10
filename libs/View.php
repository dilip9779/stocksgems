<?php
class View
{
     function __construct() {
         
    }
    public function render($name)
    {
		    $listofpage = explode(',',$name);
            require 'views/header.php';
	        require 'views/menu.php';
			foreach($listofpage as $name){
	        require 'views/'.$name.'.php';
			}
	        require 'views/footer.php';

    }
     public function log_render($name)
    {
	        require 'views/'.$name.'.php';
	       
    }
}