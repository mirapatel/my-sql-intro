<?php

abstract class Database {
	protected $dbc;
	public $data = [];

	public function __construct($input = null){
		if (static::$columns) {
			foreach (static::$columns as $column) {
				$this->$column = null;
			}
		}
		// echo "I M AN OBJECT";
		if(is_numeric($input)){
			$this->find($input);
		}

		if(is_array($input)) {
			foreach (static::$columns as $column) {
				$this->$column = $input[$column];
			}
		}
	}

	protected static function getDatabaseConnection() {

		$dsn = "mysql:host=localhost;dbname=mira_db;charset=utf8";
		$dbc = new PDO($dsn, 'root', '');

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc;
	}

	public function SelectAll() {

		$dbc = static::getDatabaseConnection();

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename;
		
		$statement = $dbc->prepare($sql);

		$statement->execute();

		$Array = [];

		while($all = $statement->fetch(PDO::FETCH_ASSOC)){
			$Array[]= $all;
		}
		return $Array;

	}

	public function find($id) {

		$dbc = static::getDatabaseConnection();

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tablename . " WHERE id=:id"; 
		
		$statement = $dbc->prepare($sql);

		$statement->bindValue(":id", $id);

		$statement->execute();

		$singlerecord = $statement->fetch(PDO::FETCH_ASSOC);
		$this->data = $singlerecord;

	}

	public function insert() {
		$dbc = static::getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);

		$sql = "INSERT INTO " . static::$tablename . "(" . implode(',', $columns) . ")  VALUES (";

		$insertColumns = [];
			foreach ($columns as $column) {
				array_push($insertColumns, ":" . $column);
			}

		$sql .= implode(',', $insertColumns). ")";
	
		$statement = $dbc->prepare($sql);

		foreach($columns as $column) {
			$statement->bindValue(":".$column, $this->$column);
		}

		$result = $statement->execute();

		$this->id = $dbc->lastInsertID();


	}

	public function update() {

		$dbc = static::getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);

		$sql = "UPDATE ". static::$tablename . " SET ";	

		$updateColumns = [];

		foreach($columns as $column) {
			array_push($updateColumns, $column. "=:" .$column);
		}

		$sql .= implode(',', $updateColumns). " WHERE id=:id";

		$statement = $dbc->prepare($sql);

		foreach(static::$columns as $column) {

			$statement->bindValue(":".$column, $this->$column);
		}

		$result = $statement->execute();
	}

	public static function delete() {

		$dbc = static::getDatabaseConnection(); //variable 

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$sql = "DELETE FROM " . static::$tablename . " WHERE id = :id";

		$statement= $dbc->prepare($sql);

		$statement->bindValue(":id", $id);

		$statement->execute();
	}

	// public function __set($name, $value) {

	// 	var_dump($name);
	// 	var_dump($value);
		
	// 	$this->data[$name] = $value;
	// }

	public function __get($name) {
		//when an object is read out in the browser
		if(in_array($name, static::$columns)) {
			return $this->data[$name];
		} else {
			echo "Property '$name' is not found in the data variable";
		}

	}


	public function __set($name, $value) {
		//setting values to the property of objects, which is initially it is set to null by the construct function
		if(in_array($name, static::$columns)) {
			$this->data[$name] = $value;
		} else {
			echo "Property '$name' is not found in the data variable";
		}
	}


}










