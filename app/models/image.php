<?php
class Image implements \JsonSerializable {
    private int $id;
    private int $artistId;
    private string $name;
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

    public function getArtistId(): int {
        return $this->artistId;
    }
    public function setArtistId(int $artistId): self {
        $this->artistId = $artistId;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }
}
?>