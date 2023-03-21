<?php
class Artist implements \JsonSerializable {
    private int $id;
    private string $name;

    private string $description;

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

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getDescripition(): string {
        return $this->description;
    }
    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }
}
?>