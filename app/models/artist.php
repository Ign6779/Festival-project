<?php
require __DIR__ . '/image.php';

class Artist implements \JsonSerializable {
    private int $id;
    private string $name;
    private string $description;
    private string $song;
    private string $topSong;
    private array $images;

    #[ReturnTypeWillChange]
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        $vars['images'] = array_map(function ($image) {
            return $image->jsonSerialize();
        }, $this->images);
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

    public function getSong(): string {
        return $this->song;
    }
    public function setSong(string $song): self {
        $this->song = $song;
        return $this;
    }

    public function getTopSong(): string {
        return $this->topSong;
    }
    public function setTopSong(string $topSong): self {
        $this->topSong = $topSong;
        return $this;
    }

    public function getImages(): array {
        return $this->images;
    }
    public function setImages(array $images): self {
        $this->images = $images;
        return $this;
    }
    public function addImage(Image $Image) {
        $this->images[] = $Image;
    }

}
?>