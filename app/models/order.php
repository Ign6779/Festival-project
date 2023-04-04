<?php

class Order implements \JsonSerializable
{
    private int $id;
    private int $user_id;
    private float $amount;
    private string $status;
    private string $payment_method;
    private string $time_of_purchase;
    private string $payment_id;


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
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }
    public function getAmount(): float
    {
        return $this->amount;
    }
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): self
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    public function getTimeOfPurchase(): string
    {
        return $this->time_of_purchase;
    }

    public function setTimeOfPurchase(string $time_of_purchase): self
    {
        $this->time_of_purchase = $time_of_purchase;
        return $this;
    }

    public function getPaymentId(): string
    {
        return $this->payment_id;
    }
    public function setPaymentId(string $id): self
    {
        $this->payment_id = $id;
        return $this;
    }

}
?>