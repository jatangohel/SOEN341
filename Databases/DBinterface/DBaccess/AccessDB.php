<?php

	/**
	
	* This function is used only once at the beginning of the file that will access the db.
	
	* @param no parameters (we are using only a single db)
	
	* @return $pdo object (it's recommended to store one variable at the beginning of your file)
	
	*/
	function accessDB(){
		//db info
		$dbServerName = 'localhost';
		$dbUserName = 'root';
		$dbPassword = 'root';
		$dbName = 'sequencebuilder';
		
		//set DSN
		$dsn = 'mysql:host='.$dbServerName.';dbname='.$dbName;
		
		//create a PDO instance
		$pdo = new PDO($dsn,$dbUserName,$dbPassword);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		return $pdo;
	}
	
	
	/**
	
	* This function is used whenever you want to retrieve data from the db.
	
	* @param $pdo returned by accessDB() function 
	
	* @param $query the query you wish to run
	
	* @return array of the fields retrieved (you need to use while loop to get the data) 
	
	*/
	function retrieve($pdo,$query){
	
		$stmt = $pdo->query($query);
	
		return $stmt;
	}




?>