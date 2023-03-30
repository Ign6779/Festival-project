<?php

class Event implements \JsonSerializable
{
    private int $id;
    private string $title;
    private string $date;
    private string $start_time;
    private string $end_time;
    private string $event_type;
    private int $seats;
    private float $price;


    #[ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
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

    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }
    public function getStartTime(): string
    {
        return $this->start_time;
    }
    public function setStartTime(string $start_time): self
    {
        $this->start_time = $start_time;
        return $this;
    }

    public function getEndTime(): string
    {
        return $this->end_time;
    }
    public function setEndTime(string $end_time): self
    {
        $this->end_time = $end_time;
        return $this;
    }

    public function getType(): string 
    {
        return $this->event_type;
    }
    public function setType(string $type): self 
    {
        $this->event_type = $type;
        return $this;
    }

    public function getSeats(): int 
    {
        return $this->seats;
    }
    public function setSeats(int $seats):self 
    {
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
}
?>