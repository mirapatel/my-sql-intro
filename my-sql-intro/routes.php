<?php

require "Controllers/Controller.php";
require "Controllers/HomeController.php";
require "Controllers/MoviesController.php";

//ternary if operator to get page information
$page = isset($_GET['page']) ? $_GET['page'] : "home";
// switch to the page based on 'page' info in url, if not, 'home' will be loaded.
// If a 'page' found, goes to default case.
switch ($page) {
 	case 'home':
 		$controller = new HomeController;
 		$controller->show();
 		break;
 	case 'movie':
 		$controller = new MoviesController;
 		$controller->show();
 		break;
 		// include "templates/movieForm.php"
 	case 'add':
 		addMovie();
 		break;
 	case 'edit':
 		$controller = new MoviesController;
 		$controller->editMovie();
 		break;
	case 'delete':
		$controller = new MoviesController;
		$controller->delete();
		break;
 	default:
 		echo "Error 404! Page not found.";
 		break;
 } 
