<?php
require __DIR__ . '/venue.php';
require __DIR__ . '/artist.php';

class DanceEvent implements \JsonSerializable {
    private int $id;
    private Venue $venue;
    private string $date;
    private string $startTime;
    private string $endTime;
    private string $session;
    private int $availableTickets;
    private float $price;
    private array $artists;

    #[ReturnTypeWillChange]

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        $vars['venue'] = $this->venue->jsonSerialize();
        $vars['artists'] = array_map(function ($artist) {
            return $artist->jsonSerialize();
        }, $this->artists);
        return $vars;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getVenue(): Venue {
        return $this->venue;
    }
    public function setVenue(Venue $venue): self {
        $this->venue = $venue;
        return $this;
    }

    public function getDate(): string {
        return $this->date;
    }
    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }

    public function getStartTime(): string {
        return $this->startTime;
    }
    public function setStartTime(string $startTime): self {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEndTime(): string {
        return $this->endTime;
    }
    public function setEndTime(string $endTime): self {
        $this->endTime = $endTime;
        return $this;
    }

    public function getSession():string {
        return $this->session;
    }
    public function setSession(string $session):self {
        $this->session = $session;
        return $this;
    }

    public function getAvailableTickets(): int {
        return $this->availableTickets;
    }
    public function setAvailableTickets(int $availableTickets): self {
        $this->availableTickets = $availableTickets;
        return $this;
    }

    public function getPrice(): float {
        return $this->$price;
    }
    public function setPrice(float $price): self {
        $this->price = $price;
        return $this;
    }

    public function getArtists(): array {
        return $this->artists;
    }
    public function setArtists(array $artists): self {
        $this->artists = $artists;
        return $this;
    }
    public function addArtist(Artist $artist) {
        $this->artists[] = $artist;
    }
}