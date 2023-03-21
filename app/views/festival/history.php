<?php
include __DIR__ . '/../header.php';
?>

<!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a class="arrow-up" href="#top">&#8593</a>
</div>

<div class="history-header">
    <img src="/img/history-header.png" alt="Image of Haarlem St. Bavo church" id="history-header-image">
    <h1 id="history-header-text">Historical Haarlem</h1>
    <br><a class="btn-red" id="history-header-button" href="festival/overview">Buy Tickets</a>

</div>

<section class="history-timetable">
    <h2>Timetable</h2>
    <?php
    echo '<table>';
    echo '<thead><tr><th>Date</th><th>Time</th><th>Available seats<br>English</th><th>Available seats<br>Dutch</th><th>Available seats<br>Chinese</th></thead>';
    echo '<tbody>';
    foreach ($tours as $tour) {
        echo '<tr>';
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

    <div id="carouselExampleControls" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <? 
            foreach ($locations as $location) {
                ?>
                <div id="<? echo $location->getId(); ?>" class="carousel-item active">
                    <div class="d-flex justify-content-center w-100 h-100">
                        <img src="/img/<? echo $location->getPicture(); ?>" class="align-middle w-50 "
                            alt="<? echo $location->getPicture(); ?>">
                    </div>
                </div>
            <?
            } ?>
        </div>

        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn btn-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon btn btn-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div id="location-information">

    </div>

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

<script>

    $(document).ready(function () {

        $('#carouselExampleControls').on('slid.bs.carousel', function () {
            document.getElementById("location-information").innerHTML = "";
            var active = document.getElementsByClassName("carousel-item active")[0].id;

            fetch('http://localhost/api/history/getOneLocaion?id=' + active, {
                method: 'GET'
            })
                .then(result => result.json())
                .then((data) => {
                    console.log(data);
                    data.forEach(getLocation);
                })
                .catch(error => console.log(error));
        });
    });

    function getLocation(locationInput) {
        var location = document.getElementById("location-information");
        header = document.createElement("h2");
        header.innerHTML = locationInput.name;
        pargraph = document.createElement("p");
        pargraph.innerHTML = locationInput.description;
        img = document.createElement("img");
        img.src = "/img/" + locationInput.picture;
        location.appendChild(header);
        location.appendChild(pargraph);
        location.appendChild(img);
    }

</script>

<?php
include __DIR__ . '/../footer.php';
?>