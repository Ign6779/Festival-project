<?php
require_once __DIR__ . '/repository.php';

class EditorRepository extends Repository{
    function UpdateContent($id, $content){
        try{
            $sql = "UPDATE editor
            SET content = :content, created = NOW()
            WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':content', $newContent);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}