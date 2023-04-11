<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';

class LoginController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/login/login.php';
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            if (!empty($_POST['emailOrUsernameInput']) && !empty($_POST['passwordInput'])) {
                $emailOrUsername = htmlspecialchars($_POST['emailOrUsernameInput']);
                $password = htmlspecialchars($_POST['passwordInput']);
                $user = $this->userService->verifyUser($emailOrUsername, $password);

                switch ($user) {
                    case null:
                        $message = "Wrong password or email address!";
                        require __DIR__ . '/../views/login/login.php';
                        break;

                    case $user->getRole() == "admin":
                        $_SESSION["user"] = $user->getId();
                        require __DIR__ . '/../views/admin/index.php';
                        break;

                    case $user->getRole() == "customer":
                        $_SESSION["user"] = $user->getId();
                        header('location:/');
                        break;

                    case $user->getRole() == "employee":
                        $_SESSION["user"] = $user->getId();
                        //require the page for the employee
                        break;
                }
            }

        }
    }

    public function register()
    {
        require_once __DIR__ . '/../views/login/register.php';
    }

    public function signUp()
    {
        if (isset($_POST['register'])) {
            if (!empty($_POST['usernameInput']) && !empty($_POST['emailInput']) && !empty($_POST['passInput'])) {
                $username = htmlspecialchars($_POST['usernameInput']);
                $email = htmlspecialchars($_POST['emailInput']);
                $password = htmlspecialchars($_POST['passInput']);
                $usernameToCheck = $this->userService->getByUsername($username);
                $emailToCheck = $this->userService->getUserByEmail($email);
                $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                $address = htmlspecialchars($_POST['addressInput']);
                if ($usernameToCheck == null && $emailToCheck == null) {
                    $this->userService->createUser('customer', $username, $email, $address, $phoneNumber, $password, date("Y/m/d"));
                    header('location:/');
                } else if ($usernameToCheck != null && $emailToCheck == null) {
                    $message = "Username already in use! please try something else";
                    require_once __DIR__ . '/../views/login/register.php';
                } else if ($usernameToCheck == null && $emailToCheck != null) {
                    $message = "Email already in use! please try something else";
                    require_once __DIR__ . '/../views/login/register.php';
                } else {
                    $message = "Username and Email already in use! please try something else";
                    require_once __DIR__ . '/../views/login/register.php';
                }
            }
        }
    }
    public function logout()
    {
        $_SESSION["user"] = null;
        header('location:/');
    }
}
?>