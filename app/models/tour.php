<?php
class Tour implements \JsonSerializable
{
    private int $id;
    private int $event_id;
    private string $date;
    private string $startTime;
    private string $endTime;
    private string $language;
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

    public function getEventId(): int
    {
        return $this->event_id;
    }

    public function setEventId(int $id): self
    {
        $this->event_id = $id;
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
        return $this->startTime;
    }
    public function setStartTime(string $time): self
    {
        $this->startTime = $time;
        return $this;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function setEndTime(string $time): self
    {
        $this->endTime = $time;
        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }


    public function getSeats(): int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;
        return $this;
    }
}
?>