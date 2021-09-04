<?php

$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();

class Db{
	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $dbname = "blog"; 

	protected function connect(){ 
		try{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$pdo = new PDO($dsn, $this->user, $this->pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
}
}

error_reporting($errorlevel);