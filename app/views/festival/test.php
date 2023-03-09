this is the test page.
<?php
echo '<table>';
echo '<thead><tr><th>Date</th><th>Start Time</th><th>End Time</th><th>Price</th><th>Session</th><th>Venue</th><th>Artists</th></tr></thead>';
echo '<tbody>';
foreach ($danceEvents as $danceEvent) {
    echo '<tr>';
    echo '<td>' . $danceEvent->getDate() . '</td>';
    echo '<td>' . $danceEvent->getStartTime() . '</td>';
    echo '<td>' . $danceEvent->getEndTime() . '</td>';
    echo '<td>' . $danceEvent->getPrice() . '</td>';
    echo '<td>' . $danceEvent->getSession() . '</td>';
    echo '<td>' . $danceEvent->getVenue()->getName() . ' (' . $danceEvent->getVenue()->getLocation() . ')</td>';
    echo '<td>';
    foreach ($danceEvent->getArtists() as $artist) {
        echo $artist->getName() . '<br>';
    }
    echo '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>