<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createUser($role, $email, $password, $registration, $username)
    {
        try {
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("INSERT INTO users (id, role, username, email, address, phone, password, registration) VALUES (NULL, :r, :username, :email, 'test', '12365489', :pass, :registration)");
            $stmt->bindParam(':r', $role);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $hasedPassword);
            $stmt->bindParam(':registration', $registration);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

//when address and phone input fields are added

// function createUser($role, $email, $password, $address, $phone)
// {
//     try {
//         $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
//         $stmt = $this->connection->prepare("INSERT INTO users (id, role, username, email, address, phone, password, registration) VALUES (NULL, :r, :username, :email, :adr, :phone, :pass, :registration)");
//         $stmt->bindParam(':r', $role);
//         $stmt->bindParam(':username', $email);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':adr', $address);
//         $stmt->bindParam(':pass', $hasedPassword);
//         $stmt->bindParam(':phone', $phone);
//         $stmt->bindParam(':registration', $registration);
//         $stmt->execute();
//     } catch (PDOException $e) {
//         echo $e;
//     }
// }

// function insert($user) {
//     try {
//         $stmt = $this->connection->prepare("INSERT INTO users ()")
//     }
// }
}
?>