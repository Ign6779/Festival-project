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
                        $_SESSION["user"] = $user;
                        require __DIR__ . '/../views/admin/index.php';
                        break;

                    case $user->getRole() == "customer":
                        $_SESSION["user"] = $user;
                        require __DIR__ . '/../views/home/homepage.php';
                        break;

                    case $user->getRole() == "employee":
                        $_SESSION["user"] = $user;
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

    public function forgotpassword()
    {
        require_once __DIR__ . '/../views/login/forgotpassword.php';
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
                if ($usernameToCheck == null && $emailToCheck == null) {
                    //when address and phone input fields are added
                    // $this->userService->createUser($role, $email, $password, $address, $phone);
                    $this->userService->createUser(0, $email, $password, date("Y/m/d"), $username);
                    require_once __DIR__ . '/../views/home/homePage.php';
                } else {
                    $message = "username or email already in use! please try something else";
                    require_once __DIR__ . '/../views/login/register.php';
                }

            }
        }
    }

    public function resetpassword()
    {
        if (isset($_POST["reset-request-submit"])) {

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "the site url?selector=" . $selector . "&validator=" . bin2hex($token);

            $expires = date("U") + 1800;



        } else {
            //in case the request isn't sent
        }
        require_once __DIR__ . '/../views/login/resetpassword.php';
    }

    public function logout()
    {
        $_SESSION["user"] = null;
        require_once __DIR__ . '/../views/home/homePage.php';
    }
}
?>