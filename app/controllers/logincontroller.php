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

    public function resetPassword()
    {
        require_once __DIR__ . '/../views/login/resetpassword.php';
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
                    // $this->userService->createUser(0, $email, $password, date("Y/m/d"), $username);
                    require_once __DIR__ . '/../views/home/homePage.php';
                } else {
                    $message = "username or email already in use! please try something else";
                    require_once __DIR__ . '/../views/login/register.php';
                }

            }
        }
    }

    public function sendEmailToRest()
    {
        if (isset($_POST['sendRestEmail'])) {
            if (isset($_POST['emailInput'])) {
                $email = htmlspecialchars($_POST['emailInput']);
                $user = $this->userService->getUserByEmail($email);
                if ($user == null) {
                    $message = "Email not found! please use a correct email.";
                    require_once __DIR__ . '/../views/login/forgotpassword.php';
                    return;
                }
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'haarlemfestival2023@gmail.com';
                $mail->Password = 'huycjscntxlsxnit';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('haarlemfestival2023@gmail.com', 'Haarlem festival');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "Rest password";
                $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Click the link below to reset your password:<br><br><a href="http://localhost/login/resetPassword?email=' . $user->getEmail() . '">Reset Password</a><br><br>Alternatively, you can copy and paste the following URL into your browser:<br>http://localhost/login/resetPassword?email=' . $user->getEmail() . '<br><br>Thank you,<br>Haarlem festival';
                $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\nClick the link below to reset your password:\nhttp://localhost/login/resetPassword?email=' . $user->getEmail() . '\n\nAlternatively, you can copy and paste the following URL into your browser:\nhttp://localhost/login/resetPassword?email=' . $user->getEmail() . '\n\nThank you,\nHaarlem festival';
                $mail->send();
            }
        }
    }

    public function updatePassword()
    {
        if (isset($_POST['resetpassword'])) {
            $email = htmlspecialchars($_GET['email']);
            $password = htmlspecialchars($_POST['passwordInput']);
            $this->userService->updatePassword($email, $password);
            $this->login();
        }
    }
    // public function resetpassword()
    // {
    //     if (isset($_POST["reset-request-submit"])) {

    //         $selector = bin2hex(random_bytes(8));
    //         $token = random_bytes(32);

    //         $url = "the site url?selector=" . $selector . "&validator=" . bin2hex($token);

    //         $expires = date("U") + 1800;



    //     } else {
    //         //in case the request isn't sent
    //     }
    //     require_once __DIR__ . '/../views/login/resetpassword.php';
    // }



    public function logout()
    {
        $_SESSION["user"] = null;
        require_once __DIR__ . '/../views/home/homePage.php';
    }
}
?>