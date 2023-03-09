<?php
include __DIR__ . '/../header.php';
?>

<div class="history-header">
    <img src="/img/history-header.png" alt="Image of Haarlem St. Bavo church" id="history-header-image">
    <h1 id="history-header-text">Historical Haarlem</h1>
    <br><a class="btn-red" id="history-header-button" href="festival/overview">Buy Tickets</a>

</div>

<section class="history-timetable">
    <h2 id="opit">Timetable</h2>
    <!-- <table>
        <tr class="history-timetable-header">
            <th class="history timetable">Date</th>
            <th class="history timetable">Hour</th>
            <th class="history timetable">Available seats<br>English tour</th>
            <th class="history timetable">Available seats<br>Dutch tour</th>
            <th class="history timetable">Available seats<br>Chinese tour</th>
        </tr>
        <tr>

        </tr>

        <tr>
        </tr>
    </table> -->
    <?php
        echo '<table>';
        echo '<thead><tr><th>id</th><th>Date</th><th>Time</th><th>Available seats English</th><th>Available seats Nl</th><th>Available seats Ch</th></thead>';
        echo '<tbody>';
        foreach ($tours as $tour) {
            echo '<tr>';
            echo '<td>' . $tour->getId() . '</td>';
            echo '<td>' . $tour->getDate() . '</td>';
            echo '<td>' . $tour->getTime() . '</td>';
            echo '<td>' . $tour->getAvaliableSeatsEn() . '</td>';
            echo '<td>' . $tour->getAvailableSeatsNl() . '</td>';
            echo '<td>' . $tour->getAvailableSeatsCh() . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    ?>
</section>

<section class="history-locations">
    <h2>Tour Stops</h2>
</section>

<section class="tour-map">
    <img src="/img/history-map.png" alt="map of tour locations" class="history-tour-map" />
    <div class="tour-locations">
        <h2>Tour Locations</h2>
        <ul class="tour-locations-list">
            <li>
                <div class="li-circle">1</div>
                <div class="li-options">Start location:<br>Bavo Church (Grote Markt 22, 2011 RD Haarlem)</div>
            </li>
            <li>
                <div class="li-circle">2</div>
                <div class="li-options">Grote Markt (Grote Markt, 2011 RD Haarlem) </div>
            </li>
            <li>
                <div class="li-circle">3</div>
                <div class="li-options">De Hallen Haarlem (Grote Markt 16, 2011 RD Haarlem)</div>
            </li>
            <li>
                <div class="li-circle">4</div>
                <div class="li-options">Proveniershof (Grote Houtstraat 142D, 2011 SV Haarlem) </div>
            </li>
            <h3>Break location:</h3>
            <li>
                <div class="li-circle">5</div>
                <div class="li-options">Jopenkerk (Gedempte Voldersgracht 2, 2011 WD Haarlem) </div>
            </li>
            <li>
                <div class="li-circle">6</div>
                <div class="li-options">Waalse Kerk (Begijnhof 28, 2011 HE Haarlem) </div>
            </li>
            <li>
                <div class="li-circle">7</div>
                <div class="li-options">Molen de Adriaan (Papentorenvest 1A, 2011 AV Haarlem) </div>
            </li>
            <li>
                <div class="li-circle">8</div>
                <div class="li-options">Amsterdamse Poort (2011 BZ Haarlem) </div>
            </li>
            <li>
                <div class="li-circle">9</div>
                <div class="li-options">Hofje van Bakenes (Wijde Appelaarsteeg 11F, 2011HB Haarlem) </div>
            </li>
        </ul>
    </div>
</section>

<?php
include __DIR__ . '/../footer.php';
?>