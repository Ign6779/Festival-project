<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';

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
                $resetToken = bin2hex(random_bytes(32));
                $resetTokenExpiration = date('Y-m-d H:i:s', strtotime('+15 minutes'));
                $resetTokenExpirationDate = DateTime::createFromFormat('Y-m-d H:i:s', $resetTokenExpiration);
                require_once __DIR__ . '/../views/header.php';
                try {
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
                    $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Click the link below to reset your password:<br><br><a href="https://ccd6-145-81-206-178.ngrok-free.app/resetpassword?token=' . $resetToken . '">Reset Password</a><br><br>Alternatively, you can copy and paste the following URL into your browser:<br>https://ccd6-145-81-206-178.ngrok-free.app/resetPassword?token=' . $resetToken . '<br><br>Thank you,<br>Haarlem festival';
                    $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\nClick the link below to reset your password:\nhttps://ccd6-145-81-206-178.ngrok-free.app/resetpassword?token=' . $resetToken . '\n\nAlternatively, you can copy and paste the following URL into your browser:\nhttps://ccd6-145-81-206-178.ngrok-free.app/resetPassword?token=' . $resetToken . '\n\nThank you,\nHaarlem festival';
                    $mail->send();
                    $user->setToken($resetToken);
                    $user->setTokenExpirationDate($resetTokenExpirationDate);
                    $this->userService->updateUser($user);
                    $message = "The email has been sent succesfully, the steps to reset your password are there.";
                    include_once __DIR__ . '/../views/messages/success.php';
                } catch (Exception $e) {
                    $message = "Something went wrong, try agin later.";
                    include_once __DIR__ . '/../views/messages/error.php';
                }

            }
        }
    }
}
?>