<?php
require __DIR__ . '/../repositories/eventrepository.php';
//require __DIR__ . '/../models/event.php';

class EventService
{
    private $repository;

    public function __construct() {
        $this->repository = new EventRepository();
    }
    public function getAll()
    {
        $events = $this->repository->getAll();
        return $events;
    }

    public function getByType($type)
    {
        $events = $this->repository->getByType($type);
        return $events;
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function CreateEvent(Event $event) {
        $this->repository->CreateEvent($event);
    }

    public function UpdateEvent(Event $event) {
        $this->repository->UpdateEvent($event);
    }

    public function DeleteEvent(int $id) {
        $this->repository->DeleteEvent($id);
    }
}