<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/editorservice.php';

class EditorController extends Controller {

    private $editorService;

    public function __construct(){
        $this->editorService = new EditorService();
    }


    public function index(){

    }
    public function updateEditor($id, $newContent)
    {
        $editorModel = $this->loadModel('EditorModel');
        $updated = $editorModel->updateEditorContent($id, $newContent);
        if ($updated) {
            // Show success message or redirect to success page
        } else {
            // Show error message or redirect to error page
        }
    }
}
?>