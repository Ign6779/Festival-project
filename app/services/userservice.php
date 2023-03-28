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

    public function getUserByEmail($email){
        return $this->repository->getUserByEmail($email);
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

    public function createUser($role, $email, $password, $registration, $username)
    {
        $this->repository->createUser($role, $email, $password, $registration, $username);
    }

    public function deleteUser($id)
    {
        $this->repository->deleteUser($id);
    }



//when address and phone input fields are added

// public function createUser($role, $email, $password, $address, $phone){
//     $this->repository->createUser($role, $email, $password, $address, $phone);
// }

}
?>