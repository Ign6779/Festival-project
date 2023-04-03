<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class ResetPasswordController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/login/resetpassword.php';
    }

    public function login()
    {
        require_once __DIR__ . '/../views/login/login.php';
    }

    public function updatePassword()
    {
        if (isset($_POST['resetpassword'])) {
            $token = htmlspecialchars($_GET['token']);
            $password = htmlspecialchars($_POST['passwordInput']);
            $user = $this->userService->getUserByToken($token);
            if ($user && $user->getTokenExpirationDate() > date('Y-m-d H:i:s')) {
                // Token is valid, allow user to reset password
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $this->login();
            } else {
                // Token is invalid or has expired, show error message
                $message = "try to send another email, because this link has been expired";
                require_once __DIR__ . '/../views/login/resetpassword.php';
            }
            $user->setToken(null);
            $user->setTokenExpirationDate(null);
            $this->userService->updateUser($user);

        }
    }
}
?>