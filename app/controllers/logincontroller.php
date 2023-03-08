<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class LoginController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require __DIR__ . '/../views/login/login.php';
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            if (!empty($_POST['emailInput']) && !empty($_POST['passwordInput'])) {
                $email = htmlspecialchars($_POST['emailInput']);
                $password = htmlspecialchars($_POST['passwordInput']);
                $user = $this->userService->verifyUser($email, $password);
                switch ($user) {
                    case null:
                        $message = "Wrong password or email address!";
                        include __DIR__ . '/../views/messages/error.php';
                        require __DIR__ . '/../views/login/login.php';
                        break;

                    // case $user->getType() == "admin":
                    //     $_SESSION["user"] = $user;
                    //     header('location:/admin');
                    //     break;

                    // case $user->getType() == "customer":
                    //     $_SESSION["user"] = $user;
                    //     header('location:/');
                    //     break;
                }
            } else {

                // require_once __DIR__ . '/../views/login/login.php';
                // $message = "Please fill in the required information!";
                // include __DIR__ . '/../views/warning.php';
            }
        }
    }

    public function register()
    {
        require __DIR__ . '/../views/login/register.php';
    }

    public function forgotpassword()
    {
        require __DIR__ . '/../views/login/forgotpassword.php';
    }

    public function signUp()
    {
        if (isset($_POST['register'])) {
            if (!empty($_POST['usernameInput']) && !empty($_POST['emailInput']) && !empty($_POST['passInput'])) {
                $userName = htmlspecialchars($_POST['usernameInput']);
                $email = htmlspecialchars($_POST['emailInput']);
                $password = htmlspecialchars($_POST['passInput']);
                $this->userService->createUser(0, $email, $password, date("Y/m/d") );
                //when address and phone input fields are added
                // $this->userService->createUser($role, $email, $password, $address, $phone);
                require_once __DIR__ . '/../views/home/homePage.php';
            } else {
                // require_once __DIR__ . '/../views/login/register.php';
                // $message = "Please fill in the required information!";
                // include __DIR__ . '/../views/warning.php';
            }
        }
    }
}
?>