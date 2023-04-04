<?php
require __DIR__ . '/../repositories/editorrepository.php';

class EditorService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EditorRepository();
    }

    public function getAll() {
        $contents = $this->repository->getAll();
        return $contents;
    }

    public function updateContent($id, $content)
    {
        $this->repository->updateContent($id, $content);
    }

}