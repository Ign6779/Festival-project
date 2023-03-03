this is the test page.
<?php
echo '<table>';
echo '<thead><tr><th>Date</th><th>Start Time</th><th>End Time</th><th>Venue</th><th>Artists</th></tr></thead>';
echo '<tbody>';
foreach ($jazzEvents as $jazzEvent) {
    echo '<tr>';
    echo '<td>' . $jazzEvent->getDate() . '</td>';
    echo '<td>' . $jazzEvent->getStartTime() . '</td>';
    echo '<td>' . $jazzEvent->getEndTime() . '</td>';
    echo '<td>' . $jazzEvent->getVenue()->getName() . ' (' . $jazzEvent->getVenue()->getLocation() . ')</td>';
    echo '<td>';
    foreach ($jazzEvent->getArtists() as $artist) {
        echo $artist->getName() . '<br>';
    }
    echo '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>