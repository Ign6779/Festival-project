<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/kidsactivity.php';

class KidsRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM kids");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'KidsActivity');
            $kidsActivities = $stmt->fetchAll();

            return $kidsActivities;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

}
?>