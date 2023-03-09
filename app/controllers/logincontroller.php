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
                    
                    //just for testing
                    default:
                        require_once __DIR__ . '/../views/home/homePage.php';
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
                $message = "Please fill in the required information!";
                include __DIR__ . '/../views/messages/warning.php';
                require_once __DIR__ . '/../views/login/login.php';
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
                $this->userService->createUser(0, $email, $password, date("Y/m/d"), $username);
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
}
?>