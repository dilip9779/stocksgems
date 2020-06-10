<?php
class Controller
{
	protected $vars = array();
    function __construct() {
             $this->view = new View();
        }
    public function loadModel($name)
        {
        $path = 'models/'.$name.'_model.php';
            if(file_exists($path))
            {
                require 'models/'.$name.'_model.php';
                $name = ucfirst($name);
                $modelName = $name.'_Model';
                $this->model = new $modelName();
            }
        }			
    public function model($name)
    {
        $path = 'models/'.$name.'_model.php';
        if(file_exists($path))
        {
           require 'models/'.$name.'_model.php';
            $name = ucfirst($name);
            $modelName = $name.'_Model';
            $this->$name = new $modelName();
        }
    }		
}
?>