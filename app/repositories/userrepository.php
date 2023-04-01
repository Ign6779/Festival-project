<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

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

    public function getUserById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createUser($role, $username, $email, $address, $phone, $password, $registration)
    {
        try {
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("INSERT INTO users (id, role, username, email, address, phone, password, registration) VALUES (NULL, :r, :username, :email, :address, :phone, :pass, :registration)");
            $stmt->bindParam(':r', $role);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':pass', $hasedPassword);
            $stmt->bindParam(':registration', $registration);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteUser($userid)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $userid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateUser($id, $role, $username, $email, $address, $phone, $password, $registration)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE users SET role=:role, username=:username, email=:email, address=:address, phone=:phone, password=:password, registration=:registration WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':registration', $registration);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updatePassword($email, $password)
    {
        try {
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("UPDATE users SET password=:password WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hasedPassword);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>