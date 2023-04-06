<?php
require __DIR__ . '/../repositories/userrepository.php';


class UserService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getByUsername($username)
    {
        return $this->repository->getByUsername($username);
    }

    public function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }

    public function getUserById($id)
    {
        return $this->repository->getUserById($id);
    }

    public function getUserByToken($token)
    {
        return $this->repository->getUserByToken($token);
    }
    public function verifyUser($emailOrUsername, $password)
    {
        if (strpos($emailOrUsername, "@")) {
            $user = $this->getUserByEmail($emailOrUsername);
        } else {
            $user = $this->getByUsername($emailOrUsername);
        }
        if ($user != null) {
            if (password_verify($password, $user->getPassword())) {
                return $user;
            }
        }
        return null;
    }

    public function createUser($role, $username, $email, $address, $phone, $password, $registration)
    {
        $this->repository->createUser($role, $username, $email, $address, $phone, $password, $registration);
    }

    public function deleteUser($id)
    {
        $this->repository->deleteUser($id);
    }

    function updateUser($user)
    {
        $this->repository->updateUser($user);
    }

    function editUserProfile($user)
    {
        $this->repository->editUserProfile($user);
    }
}
?>