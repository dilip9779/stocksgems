<?php
class Help extends Controller
{
    function __construct() {
        parent::__construct();
         Session::init();
       $logged = Session::get('loggedIn');
            if($logged  == false)
            {
				//Session::destroy();
				header('location:'.MAIN_URL);
            exit;
            }
        
    }
    function Index()
    {
       $this->view->render('help/index'); 
    }
   public function other($arg = false)
    {
        require 'models/help_model.php';
        $model = new Help_Model();
    }
}
?>

