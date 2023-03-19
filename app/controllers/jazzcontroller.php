<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/jazzservice.php';

class JazzController extends Controller
{

    private $jazzService;

    public function __construct()
    {
        $this->jazzService = new JazzService();
    }


    public function index()
    {
        $events = $this->jazzService->getAll();
        $dates = $this->jazzService->getDatesOfEvents();
        $sortedEvents = sortEventsByDate($events, new DateTime('2023-07-28'));
        require __DIR__ . '/../views/festival/jazz.php';
    }
}
function sortEventsByDate($events, $date)
{
    $sortedEvents = [];
    $count = 0;
    foreach ($events as $event) {
        if ($event->getDate() == new DateTime('2023-07-28')) {
            $sortedEvents[$count] = $event;
            $count++;
        }
    }
    if ($sortedEvents != null)
        return $sortedEvents();
    else
        return null;
}
?>