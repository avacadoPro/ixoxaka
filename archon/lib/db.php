<?php

class Database
{

	var $dbname;
	var $host;
	var $username;
	var $password;

	public function __construct()
	{

		$this->dbname = "coordina_coordinator";
		$this->host = "localhost:3306";
		//  $this->host = "127.0.0.1";
		$this->username = 'coordina_codeit';
		// $this->username = "root";
		$this->password = "codeit1234!";
		// $this->password = "";

	}


	public function checkConnection()
	{


		try {

			$conn = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				$this->username,
				$this->password
			);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			echo "Connected";


		} catch (PDOException $e) {

			echo "ERROR: " . $e->getMessage();

		}

		$conn = null;


	}


	public function select($query)
	{

		try {

			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare($query);
			$stmt->execute();


			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

			return new RecursiveArrayIterator($stmt->fetchAll());


		} catch (PDOException $e) {

			echo "ERROR: " . $e->getMessage();

		}

		$conn = null;

	}




	public function query($query)
	{

		try {

			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare($query);
			$stmt->execute();

		} catch (PDOException $e) {

			echo "ERROR: " . $e->getMessage();

		}

		$conn = null;

	}





}





?>