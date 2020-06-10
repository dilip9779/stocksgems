<?php
class Bootstarp {
    function __construct() {
		date_default_timezone_set("Asia/Kolkata");
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/');
        $url = explode("/", $url);
		$param = array();
        if(empty($url[0]))
        {
            require 'controllers/index.php';
            $controller = new Index();
			$controller->loadModel('Index');
            $logged = Session::get('loggedIn');
            if($logged  == true) {
				$controller->model("Menumaster");
				$controller->view->menu = $controller->Menumaster->getMenu();
            } else {
				$controller->view->menu = "";			
            }			
            $controller->Index();		
            return false;
        }
			
        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file))
        {
            require $file;
        }
        else
        {
			require 'controllers/errorpage.php';
			$controller = new Errorpage();
			$controller->loadModel('Index');
            $logged = Session::get('loggedIn');
            if($logged  == true) {
				$controller->model("Menumaster");
				$controller->view->menu = $controller->Menumaster->getMenu();
            } else {
				$controller->view->menu = "";			
            }					
			$controller->Index();
			return false;
        }
		if(isset($url[2]) && isset($url[3])){
		$param[$url[2]] = base64_decode($url[3]);
			if(isset($url[4]) && isset($url[5])){
			$param[$url[4]] = base64_decode($url[5]);
				if(isset($url[6]) && isset($url[7])){
				$param[$url[6]] = base64_decode($url[7]);
			}
		}
		}
        $controller = new $url[0];
        $controller->loadModel($url[0]);
		$logged = Session::get('loggedIn');
		$page_url ='';
		if(isset($url[0])){
			$page_url = $url[0];
			if(isset($url[1])){
						$page_url .='/'.$url[1];
					}			
		}
        if($logged  == true) {
            $controller->model("Menumaster");
            $controller->view->menu = $controller->Menumaster->getMenu($page_url);
            $controller->view->Title = $controller->Menumaster->getTitle($page_url);
        } else {
            $controller->view->menu = NULL;
            $controller->view->Title =NULL;
        }
        if (isset($url[2])) {
            $controller->{$url[1]}($param);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
                return false;
            }
            else
            {
                $controller->Index();
            }
        }
    }
}
?>