this is the test page.
<?php
//require_once '/../../models/event.php';

$newEvent = new Event();
$newEvent->setId(96);
$newEvent->setDate('2023-03-04');
$newEvent->setStartTime('11:30:00');
$newEvent->setEndTime('15:40:00');
$newEvent->setType('test2');
$newEvent->setSeats(10000);

$this->eventService->DeleteEvent(96);
?>