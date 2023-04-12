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

    public function update($id, $content)
    {
        $this->repository->update($id, $content);
    }

    public function updatePage($id, $content, $img)
    {
        $this->repository->updatePage($id, $content, $img);
    }

    public function insertPage($pagename, $img, $text){
        $this->repository->insertPage($pagename, $img, $text);
    }
    
    public function delete($id)
    {
        $this->repository->delete($id);
    }

}