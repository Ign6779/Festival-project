<?php
class Jazz implements \JsonSerializable {
    private int $id;
    private date $date;
    private time $time;
    private string $artist;
    private string $venue;
    private int $price;
    private string $content;
    private string $image;

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

    public function getDate():date {
        return $this->date;
    }
    public function setDate(date $date):self {
        $this->date = $date;
        return $this;
    }

    public function getTime():time {
        return $this->time;
    }
    public function setTime(time $time):self {
        $this->time = time;
        return $this;
    }

    public function getArtist():string {
        return $this->artist;
    }
    public function setArtist(string $artist):self {
        $this->artist = $artist;
        return $this;
    }

    public function getVenue():string {
        return $venue;
    }
    public function setVenue(string $venue):self {
        $this->venue = $venue;
        return $this;
    }

    public function getPrice():int {
        return $price;
    }
    public function setPrice(int $price):self {
        $this->price = $price;
        return $this;
    }

    public function getContent():string {
        return $content;
    }
    public function setContent(string $content):self {
        $this->content = $content;
        return $this;
    }

    public function getImage():string {
        return $image;
    }
    public function setImage(string $image):self {
        $this->image = $image;
        return $image;
    }
}
?>