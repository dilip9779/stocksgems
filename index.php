<?php
/* @var $url type */
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Function.php';
//libs
require 'libs/Database.php';
require 'libs/Session.php';

require 'config/paths.php';
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			//error_reporting(E_ALL);
		break;
		case 'production':
			error_reporting(E_ALL);
		break;
		default:
			exit('The application environment is not set correctly.');
	}
}
$app = new Bootstarp();
?>