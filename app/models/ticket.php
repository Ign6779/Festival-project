<?php
require __DIR__ . '/roles.php';

class Ticket implements \JsonSerializable {

    private int $id;
    private string $title;
    private string $content;
    private float $price;
    private int $type;

    #[ReturnTypeWillChange]

    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function getId():int {
        return $this->id;
    }
    public function setId(int $id):self {
        $this->id = $id;
        return $this;
    }

    public function getTitle():string {
        return $this->title;
    }

    public function setTitle(string $title):self {
        $this->title = $title;
        return $this;
    }

    public function getContent():string {
        return $this->content;
    }

    public function setContent(string $content):self {
        $this->content = $content;
        return $this;
    }

    public function getPrice():float {
        return $this->price;
    }

    public function setPrice(float $price):self {
        $this->price = $price;
        return $this;
    }

    public function getType():int {
        return $this->type;
    }

    public function setType(int $type):self {
        $this->type = $type;
        return $this;
    }
}
?>