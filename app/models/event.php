<?php

class Event implements \JsonSerializable
{
    private int $id;
    private string $date;
    private string $start_time;
    private string $end_time;
    private string $type;
    private int $seats;


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
        return $this->type;
    }
    public function setType(string $type): self 
    {
        $this->type = $type;
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
}
?>