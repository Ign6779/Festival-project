<?php

class Repository {
    protected $connection;

    function _construct(){
        require __DIR__ . '/../dbconfig.php';

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>