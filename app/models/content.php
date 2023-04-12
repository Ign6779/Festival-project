<?php
class Content implements \JsonSerializable
{
    private int $id;
    private string $content;
    private ?string $title;
    private string $pagename;
    private ?string $img;
    private string $created;

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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getPagename(): string
    {
        return $this->pagename;
    }

    public function setPagename(string $pagename): self
    {
        $this->pagename = $pagename;
        return $this;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;
        return $this;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(): self
    {
        $this->created = date_create()->format('Y-m-d H:i:s');
        return $this;
    }
}

?>