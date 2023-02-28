<?php
class History implements \JsonSerializable {
    private int $id;
    private string $date;
    private string $time;
    private int $availableSeatsEn;
    private int $availableSeatsNl;
    private int $availableSeatsCh;

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

    public function getTime():string {
        return $this->time;
    }
    public function setTime(string $time):self {
        $this->time = $time;
        return $this;
    }

    public function getAvaliableSeatsEn():int {
        return $this->availableSeatsEn;
    }
    public function setAvailableSeatsEn(int $availableSeatsEn):self {
        $this->availableSeatsEn = $availableSeatsEn;
    }

    public function getAvailableSeatsNl():int {
        return $this->availableSeatsNl;
    }
    public function setAvailableSeatsNl(int $availableSeatsNl):self {
        $this->availableSeatsNl = $availableSeatsNl;
        return $this;
    }

    public function getAvailableSeatsCh():int {
        return $this->availableSeatsCh;
    }
    public function setAvailableSeatsCh(int $availableSeatsCh):self {
        $this->availableSeatsCh = $availableSeatsCh;
        return $this;
    }
}
?>