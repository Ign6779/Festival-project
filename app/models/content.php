<?php
class Content implements \JsonSerializable
{
    private int $id;
    private string $content;

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