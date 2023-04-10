this is the test page.
<?php
//require_once '/../../models/event.php';

// foreach ($tours as $jazzEvent) {
    echo $jazzEvent->getDate();
    echo $jazzEvent->getStartTime();
    echo $jazzEvent->getEndTime();
    echo $jazzEvent->getSeats();
    echo $jazzEvent->getPrice();
    echo $jazzEvent->getVenueId();
// }
echo $jazzEvent->getTitle();
?>