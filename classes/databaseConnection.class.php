<?php

class DatabaseConnection{
	
	private $hostname = 'localhost';
	private $dbname = 'e-commerce';
	private $username = 'root';
	private $pwd = '';
	
	protected function connect(){
		
		$dsn = 'mysql:host=' . $this->hostname . ';dbname=' . $this->dbname;
		try{

			$pdo = new PDO($dsn, $this->username, $this->pwd);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $pdo;
			
		}catch(PDOException $e){

			echo 'connection failed ' . $e->getMessage();
			die();

		}


		
	}
	
	
	
};