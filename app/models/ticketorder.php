<?php

class TicketOrder implements \JsonSerializable
{
    private int $id;

    private int $order_id;

    private int $ticket_id;

    private int $event_id;

    private bool $is_scanned;

    private Event $event;


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

    public function getOrderId(): int
    {
        return $this->order_id;
    }
    public function setOrderId($order_id): self
    {
        $this->order_id = $order_id;
        return $this;
    }
    public function getTicketId(): int
    {
        return $this->event_id;
    }
    public function setTicketId($ticket_id): self
    {
        $this->event_id = $ticket_id;
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

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function setEvent(Event $event) :self{
        $this->event = $event;
        return $this;
    }



} ?>