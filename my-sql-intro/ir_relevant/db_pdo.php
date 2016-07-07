<?php 

//set up connection and creating a db handler
$dsn = "mysql:host=localhost;dbname=mira_db;charset=utf8";

$dbc = new PDO($dsn,'root','');

//set attributes for error mode
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getMovieList() {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$statement = $dbc->prepare($sql);
	$statement->execute();
	
	$movieArray = [];

	while($allMovies = $statement->fetch(PDO::FETCH_ASSOC)){
		$movieArray[]= $allMovies;
	}
	
	return $movieArray;

}
function getSingleMovie() {
	global $dbc;

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} else {
		$id = null;
	}

	$sql = "SELECT id, title, description, release_date, duration FROM movies WHERE id =:id";

	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	$singlemovie = $statement->fetch(PDO::FETCH_ASSOC);
	return $singlemovie;

}


?>