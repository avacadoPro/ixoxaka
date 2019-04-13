<?php

class Database
{
    public $dbname;
    public $host;
    public $username;
    public $password;

    public function __construct()
    {

        /$this->dbname = "coordina_coordinator";$this->host = "localhost:3306";$this->username = 'coordina_codeit';$this->password = "codeit1234!";
        // $this->dbname = "coordina_coordinator";
        // $this->host = "localhost";
        // $this->username = 'root';
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

    public function AddSubscriber($email)
    {
        $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query="INSERT INTO subscribers( ";
        $query.=" email ";
        $query.=") VALUES (";
        $query.="'{$email}'";
        $query.=");";
        $db->query($query);
    }
}
