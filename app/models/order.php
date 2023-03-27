<?php

class Order implements \JsonSerializable {
    private int $id;
    private int $user_id;
    private bool $paid;
    private string $time_of_purchase;

    private array $boughtTickets;


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
    public function getUserId(): int {
        return $this->user_id;
    }
    public function setUserId(int $user_id): self {
        $this->user_id = $user_id;
        return $this;
    }
    public function getPaid(): bool {
        return $this->paid;
    }
    public function setpaid(bool $paid): self {
        $this->paid = $paid;
        return $this;
    }
    public function getTimeOfPurchase(): string {
        return $this->time_of_purchase;
    }
    public function setEventId(string $time_of_purchase): self {
        $this->time_of_purchase = $time_of_purchase;
        return $this;
    }
    public function getBoughtTickets(): array {
        return $this->boughtTickets;
    }
    public function setBoughtTicket(array $boughtTickets): self {
        $this->boughtTickets = $boughtTickets;
        return $this;
    }
    //get the type of the error in the addBoughtTicket...
    public function addBoughtTiket($boughtTicket) {
        $this->boughtTickets[] = $boughtTicket;
    }
}
?>