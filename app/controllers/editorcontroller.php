<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/editorservice.php';

class EditorController extends Controller {

    private $editorService;

    public function __construct(){
        $this->editorService = new EditorService();
    }


    public function index(){
        require __DIR__ . '/../views/admin/homepage-edit.php';
    }
    public function updateEditor($id, $newContent)
    {

    }
}
?>