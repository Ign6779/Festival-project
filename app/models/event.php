<?php

class Event implements \JsonSerializable {
    private int $id;
    private string $date;
    private string $startTime;
    private string $endTime;
    private string $type;

    #[ReturnTypeWillChange]
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars
    }

    public function getId():int {
        return $this->id;
    }
    public function setId(int $id):self {
        $this->id = $id;
        return $this;
    }
    
    public function getDate():string {
        return $this->date;
    }
    public function setDate(string $date):self {
        $this->date = $date;
        return $this;
    }
    
    public function getStartTime(): string {
        return $this->startTime;
    }
    public function setStartTime(string $startTime):self {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEndTime():string {
        return $this->endTime;
    }
    public function setEndTime(string $endTime):self {
        $this->endTime = $endTime;
        return $this;
    }

    public function getType():string {
        return $this->type;
    }
    public function setType(string $type) {
        $this->type = $type;
        return $this;
    }
}

?>