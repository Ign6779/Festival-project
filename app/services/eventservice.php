<?php
require __DIR__ . '/../repositories/eventrepository.php';

class EventService {
    public function getAll() {
        $repository = new EventRepository();
        $events = $repository->getAll();
        return $events;
    }

    public function getByType($type) {
        $repository = new EventRepository();
        $events = $repository->getByType($type);
        return $events;
    }
}