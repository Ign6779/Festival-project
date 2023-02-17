<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService {
    public function getAll(){
        $repository = new UserRepository();//might declare this on the UserService constructor, so there is no duplicate
        $users = $repository->getAll();
        return $users;
    }

    public function getByUsername($username) {
        $repository = new UserRepository();//if declared on constructor, delete this
        $user = $repository->getByUsername($username);
        return $user;
    }
}
?>