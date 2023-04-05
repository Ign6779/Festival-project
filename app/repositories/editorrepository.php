<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/content.php';

class EditorRepository extends Repository{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM editor");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Content');
            $contents = $stmt->fetchAll();

            return $contents;
        }
        catch (PDOException $e){
            echo $e;
        }
    }
    function update($id, $content){
        try{
            $sql = "UPDATE editor
            SET content = :content, created = NOW()
            WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}