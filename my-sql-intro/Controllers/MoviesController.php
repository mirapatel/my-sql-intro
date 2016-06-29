<?php

require "Views/MoviesView.php";
require "Views/FormView.php";

class MoviesController extends Controller {

	public function show() {
		$movie = new Movie;
		$singlemovie = $movie->find();      
		// var_dump($singlemovie);

		$view = new MoviesView(compact('singlemovie'));;
		$view->render();
	}

	public function delete(){
		Movie::deleteMovie();

		header("Location:./");
	}

	public function editMovie(){
		$view = new FormView;
		$view->render();
	}

	
}