<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

    function getByUsername($username) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

    // function insert($user) {
    //     try {
    //         $stmt = $this->connection->prepare("INSERT INTO users ()")
    //     }
    // }
}
?>