<?php
require __DIR__ . '/../../services/editorservice.php';

class EditorController
{
    private $editorService;

    function __construct()
    {
        $this->editorService = new EditorService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $content = $this->editorService->getAll();
            echo json_encode($content);
        }
    }

    public function updateContent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['id']);
            $content = htmlspecialchars($_GET['content']);
            $this->editorService->update($id, $content);
        }
    }
}


?>