<?php

abstract class Database {

	protected $dbc;

	protected static function getDatabaseConnection(){
		$dsn = "mysql:host=localhost;dbname=mira_db;charset=utf8";
		$dbc = new PDO($dsn, 'root', '');

		$dbc->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
	return $dbc;
	}

	public function selectAll() {

		$dbc = $this->getDatabaseConnection(); //arrow -- object is trying to access a method in the class

		// $sql = "SELECT " . implode(",", $this->columns) . " FROM " . $this->tablename;
		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename;
		
		$statement = $dbc->prepare($sql);

		$statement->execute();

		$array = [];
		
		while($all = $statement->fetch(PDO:: FETCH_ASSOC)){
			$array[]= $all;
		}
	// var_dump($array);
	return $array;

	}

	public function find() {

		$dbc = static::getDatabaseConnection();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename . " WHERE id=:id";

		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id); //placeholder, variable

		$statement->execute();

		$singlerecord = $statement->fetch(PDO::FETCH_ASSOC);

		return $singlerecord;

	}

	public static function deleteMovie() {
		$dbc = static::getDatabaseConnection();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "DELETE FROM " . static::$tablename . " WHERE id = :id";

		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id); //placeholder, variable

		$statement->execute();


	}	

}


