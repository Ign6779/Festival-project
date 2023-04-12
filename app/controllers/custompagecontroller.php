<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/editorservice.php';

class CustomPageController extends Controller {

    private $editorService;

    public function __construct(){
        $this->editorService = new EditorService();
    }

    public function index(){
        $contents= $this->editorService->getAll();
        require __DIR__ . '/../views/admin/custompages.php';
    }


    public function addPage()
    {
        if (isset($_POST['addpage'])) {
            $pagename = htmlspecialchars($_POST['pagename']);
            $text = htmlspecialchars($_POST['content']);
            // $imageName = htmlspecialchars($_POST['img']);
            $image = $_FILES['image'];
            // Move the uploaded file to a directory on your server
            $target_dir = '/app/public/img/';
            $target_file = $target_dir . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $target_file);
            
            $this->editorService->insertPage($pagename, $image['name'], $text);
            $this->index();
        }
    }
    
    


}
?>