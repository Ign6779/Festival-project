<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userservice.php';

class UserController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require __DIR__ . '/../views/admin/users/index.php';
    }

    public function addUserForm()
    {
        require __DIR__ . '/../views/admin/users/adduser.php';
    }

    public function addUser()
    {
        if (isset($_POST['adduser'])) {
            $role = htmlspecialchars($_POST['role']);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $registration = htmlspecialchars($_POST['registration']);
            $this->userService->createUser($role, $username, $email, $address, $phone, $password, $registration);
            $this->index();
        }
    }

    public function editUserForm()
    {
        if (isset($_GET['userId'])) {
            $id = htmlspecialchars($_GET['userId']);
            $user = $this->userService->getUserById($id);
            require __DIR__ . '/../views/admin/users/edituser.php';
        }
    }

    public function updateUser()
    {
        if (isset($_POST['updateartist'])) {
            $id = htmlspecialchars($_GET['userid']);
            $role = htmlspecialchars($_POST['role']);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $registration = htmlspecialchars($_POST['registration']);
            $this->userService->updateUser($id, $role, $username, $email, $address, $phone, $password, $registration);
            $this->index();
        }
    }
}


?>