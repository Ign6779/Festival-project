<?php
require __DIR__ . '/types.php';

 class Event implements \JsonSerializable {

    private int $id;
    private string $name;
    //private Type $type;
    private time $startHour;
    private time $endHour;
    private date $date;
    private int $availableSpots;
    private string $content;
    private string $image;

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

    // public function getType():Type {
    //     return $this->type;
    // }
    // public function setType(int $type):self {
    //     $this->type = Role::tryFrom($type);
    //     return $this;
    // }

    public function getStartHour():time {
        return $this->startHour;
    }
    public function setStartHour(time $startHour) {
        $this->startHour = $startHour;
        return $this;
    }

    public function getEndHour():time {
        return $this->endHour;
    }
    public function setEndHour(time $endHour):self {
        $this->endHour = $endHour;
        return $this;
    }

    public function getDate():date {
        return $this->date;
    }
    public function setDate(date $date):self {
        $this->date = $date;
        return $this;
    }

    public function getAvailableSpots():int {
        return $this->availableSpots;
    }
    public function setAvailableSpots(int $availableSpots):self {
        $this->availableSpots = $availableSpots;
        return $this;
    }

    public function getContent():string {
        return $this->content;
    }
    public function setContent(string $content):self {
        $this->content = $content;
        return $this;
    }

    public function getImage():string {
        return $this->image;
    }
    public function setImage(string $image):self {
        $this->image = $image;
        return $this;
    }
 }
?>