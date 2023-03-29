<?php
require __DIR__ . '/../../services/userservice.php';

class UserController 
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $users = $this->userService->getAll();
            echo json_encode($users);
        }
    }

    public function deleteUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['userid']);
            $this->userService->deleteUser($id);
        }
    }
}


?>