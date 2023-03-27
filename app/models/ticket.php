<?php

class Ticket implements \JsonSerializable {
    private int $id;
    private string $type;
    private int $price;
    private int $event_id;

    #[ReturnTypeWillChange]
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }
    public function getPrice(): int {
        return $this->price;
    }
    public function setPrice(int $price): self {
        $this->price = $price;
        return $this;
    }
    public function getEvenetId(): int {
        return $this->event_id;
    }
    public function setEventId(int $event_id): self {
        $this->event_id = $event_id;
        return $this;
    }
}
?>