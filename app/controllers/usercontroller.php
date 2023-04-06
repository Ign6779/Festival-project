<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';


class UserController extends Controller
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        require __DIR__ . '/../views/admin/users/index.php';
    }

    public function addUserForm()
    {
        require __DIR__ . '/../views/admin/users/adduser.php';
    }

    public function homepage()
    {
        require __DIR__ . '/../views/home/homepage.php';
    }

    public function editUser()
    {
        $user = $this->userService->getUserById(htmlspecialchars($_SESSION["user"]));
        $email = $user->getEmail();
        if (isset($_POST['edituser'])) {
            $user->setUsername(htmlspecialchars($_POST['username']));
            $user->setEmail(htmlspecialchars($_POST['email']));
            try {
                if (isset($_POST['repetpassword']) && isset($_POST['newpassword'])) {
                    if (htmlspecialchars($_POST['repetpassword']) == htmlspecialchars($_POST['newpassword'])) {
                        $user->setPassword(htmlspecialchars($_POST['newpassword']));
                    } 
                }
            } catch (Exception $e) {
                $message = "Something went wrong, try again later.";
            }

            $tmp_img = htmlspecialchars($_FILES['imageup']['tmp_name']);
            $destination = 'img/' . $_FILES['imageup']['name'];
            $user->setImage(htmlspecialchars($_FILES['imageup']['name']));

            move_uploaded_file($tmp_img, $destination);

            //this should be fixed
            // try {
            //     $mail = new PHPMailer(true);
            //     $mail->isSMTP();
            //     $mail->Host = 'smtp.gmail.com';
            //     $mail->SMTPAuth = true;
            //     $mail->Username = 'haarlemfestival2023@gmail.com';
            //     $mail->Password = 'huycjscntxlsxnit';
            //     $mail->SMTPSecure = 'tls';
            //     $mail->Port = 587;
            //     $mail->setFrom('haarlemfestival2023@gmail.com', 'Haarlem festival');
            //     $mail->addAddress($email);
            //     $mail->isHTML(true);
            //     $mail->Subject = "Chnage userdata";
            //     $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Your userdata has been chnaged<br><br>';
            //     $mail->send();
            //     $this->userService->updateUser($user);
            //     $message = "An confirmation email has been sent to you.";
            //     include_once __DIR__ . '/../views/messages/success.php';
            // } catch (Exception $e) {
            //     $message = "Something went wrong, try again later.";
            //     include_once __DIR__ . '/../views/messages/error.php';
            // }

            $this->userService->editUserProfile($user);
            $this->homepage();
            return;
        }
        require __DIR__ . '/../views/user/edituser.php';
    }

    public function addUser()
    {
        if (isset($_POST['adduser'])) {
            $role = htmlspecialchars($_POST['role']);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $registration = htmlspecialchars($_POST['registration']);
            $this->userService->createUser($role, $username, $email, $address, $phone, $password, $registration);
            $this->index();
        }
    }

    public function editUserForm()
    {
        if (isset($_GET['userId'])) {
            $id = htmlspecialchars($_GET['userId']);
            $user = $this->userService->getUserById($id);
            require __DIR__ . '/../views/admin/users/edituser.php';
        }
    }

    public function updateUser()
    {
        if (isset($_POST['updateuser'])) {

            $user = $this->userService->getUserById(htmlspecialchars($_GET['userid']));
            $user->id = htmlspecialchars($_GET['userid']);
            $user->role = htmlspecialchars($_POST['role']);
            $user->username = htmlspecialchars($_POST['username']);
            $user->email = htmlspecialchars($_POST['email']);
            $user->address = htmlspecialchars($_POST['address']);
            $user->phone = htmlspecialchars($_POST['phone']);
            $user->password = htmlspecialchars($_POST['password']);
            $user->registration = htmlspecialchars($_POST['registration']);

            $this->userService->updateUser($user);
            $this->index();
        }
    }
}


?>