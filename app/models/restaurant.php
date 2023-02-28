<?php
require __DIR__ . '/../models/session.php';

class Restaurant implements \JsonSerializable {
    private int $id;
    private string $name;
    private string $description;
    private string $content;
    private bool $halal;
    private bool $vegan;
    private int $stars;
    private array $sessions; //we store them in an array; its the only way i could bring the erd into php

    #[ReturnTypeWillChange]
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        $vars['sessions'] = $this->sessions;
        return $vars;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string {
        return $this->description;
    }
    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }

    public function getContent(): string {
        return $this->content;
    }
    public function setContent(string $content): self {
        $this->content = $content;
        return $this;
    }

    public function getHalal(): bool {
        return $this->halal;
    }
    public function setHalal(bool $halal): self {
        $this->halal = $halal;
        return $this;
    }

    public function getVegan(): bool {
        return $this->vegan;
    }
    public function setVegan(bool $vegan): self {
        $this->vegan = $vegan;
        return $this;
    }

    public function getStars(): int {
        return $this->stars;
    }
    public function setStars(int $stars): self {
        $this->stars = $stars;
        return $this;
    }

    public function getSessions(): array {
        return $this->sessions;
    }
    public function setSessions(array $sessions): self {
        $this->sessions = $sessions;
        return $this;
    }
    public function addSession(Session $session) {
        $this->sessions[] = $session;
    }
}
?>