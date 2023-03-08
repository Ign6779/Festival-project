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
        ;
    }

    public function getByUsername($username)
    {
        return $this->repository->getByUsername($username);
    }

    public function verifyUser($email, $password)
    {
        $user = $this->repository->getUserByEmail($email);
        if ($user != null) {
            if (password_verify($password, $user->getPassword())) {
                return $user;
            }
        }
        return null;
    }

    public function createUser($role, $email, $password, $registration)
    {
        $this->repository->createUser($role, $email, $password, $registration);
    }

//when address and phone input fields are added

// public function createUser($role, $email, $password, $address, $phone){
//     $this->repository->createUser($role, $email, $password, $address, $phone);
// }

// public function getAll(){
//     $repository = new UserRepository();//might declare this on the UserService constructor, so there is no duplicate
//     $users = $repository->getAll();
//     return $users;
// }

// public function getByUsername($username) {
//     $repository = new UserRepository();//if declared on constructor, delete this
//     $user = $repository->getByUsername($username);
//     return $user;
// }
}
?>