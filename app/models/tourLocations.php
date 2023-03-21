<?php

class TourLocations implements \JsonSerializable {
    private int $id;

    private string $name;

    private string $location;

    private string $description;

    private string $picture;

    #[ReturnTypeWillChange]

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name): self {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function setLocation($location): self {
        $this->location = $location;
        return $this;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    public function getPicture(): string {
        return $this->picture;
    }

    public function setPicture($picture): self {
        $this->picture = $picture;
        return $this;
    }
}

?>