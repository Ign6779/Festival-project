<?php
class Session implements \JsonSerializable {
    private int $id;
    private string $date;
    private string $startTime;
    private string $endTime;
    private int $seats;
    private float $price;
    private float $reducedPrice;
    private int $restaurantId;

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

    public function getSeats():int {
        return $this->seats;
    }
    public function setSeats(int $seats):self {
        $this->seats = $seats;
        return $this;
    }

    public function getPrice():float {
        return $this->price;
    }
    public function setPrice(float $price):self {
        $this->price = $price;
        return $this;
    }

    public function getReducedPrice():float {
        return $this->reducedPrice;
    }
    public function setReducedPrice(float $reducedPrice):self {
        $this->reducedPrice = $reducedPrice;
        return $this;
    }

    public function getRestaurantId():int {
        return $this->restaurantId;
    }
    public function setRestaurantId(int $restaurantId):self {
        $this->restaurantId = $restaurantId;
        return $this;
    }
}
?>