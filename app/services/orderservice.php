<?php
require_once '/../vendor/autoload.php';
require_once __DIR__ . '/../repositories/orderrepository.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';

class OrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function createOrder($order)
    {
        $this->repository->createOrder($order);
    }

    public function getOrderByPaymentId($id)
    {
        return $this->repository->getOrderByPaymentId($id);
    }

    public function updateOrder($order)
    {
        $this->repository->updateOrder($order);
    }

    public function sendInvoice($order, $user)
    {
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
            $mail->addAddress($user->getEmail());
            $mail->isHTML(true);
            $mail->Subject = "Rest password";
            $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Click the link below to reset your password:<br><br><a href="http://localhost/resetpassword?token=' .  . '">Reset Password</a><br><br>Alternatively, you can copy and paste the following URL into your browser:<br>http://localhost/resetPassword?token=' .  . '<br><br>Thank you,<br>Haarlem festival';
            $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\nClick the link below to reset your password:\nhttp://localhost/resetpassword?token=' .  . '\n\nAlternatively, you can copy and paste the following URL into your browser:\nhttp://localhost/resetPassword?token=' .  . '\n\nThank you,\nHaarlem festival';
            $mail->send();
            $message = "The email has been sent succesfully, the steps to reset your password are there.";
            include_once __DIR__ . '/../views/messages/success.php';
        } catch (Exception $e) {
            $message = "Something went wrong, try agin later.";
            include_once __DIR__ . '/../views/messages/error.php';
        }

    }

}