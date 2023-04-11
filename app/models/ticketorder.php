<?php

class TicketOrder implements \JsonSerializable
{
    private int $id;

    private bool $is_scanned;

    private Order $order;

    private Event $event;

    private User $user;

    private string $uuid;


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
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getIsScanned(): bool
    {
        return $this->is_scanned;
    }
    public function setIsScanned($is_scanned): self
    {
        $this->is_scanned = $is_scanned;
        return $this;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function setEvent(Event $event): self
    {
        $this->event = $event;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getUuId(): string
    {
        return $this->uuid;
    }
    public function setUuId($id): self
    {
        $this->uuid = $id;
        return $this;
    }
} ?>