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
            $title = htmlspecialchars($_POST['title']);
            $text = htmlspecialchars($_POST['content']);
            $imageName = 'img not uploaded';
            // $imageName = $_FILE['addpage']['name'];
            // $imagetype = $_FILE['addpage']['type'];
            // $imagetemp = $_FILE['addpage']['tmp_name'];
            // $destination = 'img/' . $_FILE['addpage']['name'];
            
            // if (is_uploaded_file($imagetemp)) {
            //     if (move_uploaded_file($imagetemp, $destination)) {
            //         echo "Successfully uploaded your image.";
            //     } else {
            //         echo "Failed to move your image.";
            //     }
            // } else {
            //     echo "Failed to upload your image.";
            // }
            
            $this->editorService->insertPage($pagename, $title, $imageName, $text);
            $this->index();
        }
    }
    
    


}
?>