<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class ForgotPasswordController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/login/forgotpassword.php';
    }

    public function checkUserByEmail()
    {
        if (isset($_POST[''])) {
        }
    }
}
?>