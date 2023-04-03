<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';

class RegisterController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/login/register.php';
    }
}
?>