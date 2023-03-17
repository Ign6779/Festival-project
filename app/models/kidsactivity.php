<?php
class KidsActivity implements \JsonSerializable
{
    private int $id;
    private string $activity_title;

    private string $activity_description;

    private string $img;

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

    public function getActivityTitle(): string
    {
        return $this->activity_title;
    }

    public function setActivityTitle(string $activity_title): self
    {
        $this->activity_title = $activity_title;
        return $this;
    }

    public function getActivityDescription(): string
    {
        return $this->activity_description;
    }

    public function setActivityDescription(string $activity_description): self
    {
        $this->activity_description = $activity_description;
        return $this;
    }

    public function getImage(): string
    {
        return $this->img;
    }

    public function setImage(string $img): self
    {
        $this->img = $img;
        return $this;
    }
}
?>