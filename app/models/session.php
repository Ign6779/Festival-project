<?php
require __DIR__ . '/event.php';

class Session extends Event implements \JsonSerializable {
    private int $id;
    // private string $date;
    // private string $startTime;
    // private string $endTime;
    // private int $seats;
    // private float $price;
    private int $restaurantId;
    private int $eventId;

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
    
    // public function getDate():string {
    //     return $this->date;
    // }
    // public function setDate(string $date):self {
    //     $this->date = $date;
    //     return $this;
    // }
    
    // public function getStartTime(): string {
    //     return $this->startTime;
    // }
    // public function setStartTime(string $startTime):self {
    //     $this->startTime = $startTime;
    //     return $this;
    // }

    // public function getEndTime():string {
    //     return $this->endTime;
    // }
    // public function setEndTime(string $endTime):self {
    //     $this->endTime = $endTime;
    //     return $this;
    // }

    // public function getSeats():int {
    //     return $this->seats;
    // }
    // public function setSeats(int $seats):self {
    //     $this->seats = $seats;
    //     return $this;
    // }

    // public function getPrice():float {
    //     return $this->price;
    // }
    // public function setPrice(float $price):self {
    //     $this->price = $price;
    //     return $this;
    // }

    public function getRestaurantId():int {
        return $this->restaurantId;
    }
    public function setRestaurantId(int $restaurantId):self {
        $this->restaurantId = $restaurantId;
        return $this;
    }

    public function getEventId():int {
        return $this->eventId;
    }
    public function setEventId(int $eventId):self {
        $this->eventId = $eventId;
        return $this;
    }
}
?>