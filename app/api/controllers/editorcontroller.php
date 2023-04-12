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
    public function updatePageContent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['id']);
            $content = htmlspecialchars($_GET['content']);
            $img = htmlspecialchars($_GET['img']);
            $this->editorService->update($id, $content, $img);
        }
    }
    public function deletePage()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['pageid']);
            $this->editorService->delete($id);
        }
    }
}


?>