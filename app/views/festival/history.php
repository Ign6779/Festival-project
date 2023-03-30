<?php
include __DIR__ . '/../header.php';

function returnActive($count)
{
    $active = "";
    if ($count == 1) {
        $active = "active";
    }
    return $active;
}
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
    <div>
        <h2>Timetable</h2>
        <?php
        echo '<table class="history-table-display">';
        echo '<thead><tr><th>Date</th><th>Start Time</th><th>End time<th>Language</th><th>Seats</th></thead>';
        echo '<tbody>';
        foreach ($tours as $tour) {
            echo '<tr class="history-table-display"">';

            echo '<td>' . $tour->getDate() . '</td>';
            echo '<td>' . $tour->getStartTime() . '</td>';
            echo '<td>' . $tour->getEndtTime() . '</td>';
            echo '<td>' . $tour->getLanguage() . '</td>';
            echo '<td>' . $tour->getSeats() . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        ?>
    </div>

    <div class="history-tickets" id="history-single-ticket">
        <h2>Single Ticket - 17,50</h2>
        <p>&#8226; 1 person<br>&#8226; A free drink of choice</p>
        <a class="btn-red" href="festival/overview">Buy Tickets</a>
    </div>
    <div class="history-tickets" id="history-family-ticket">
        <h2>Family Ticket - 60,00</h2>
        <p>&#8226; 4 people<br>&#8226; A free drink of choice per person</p>
        <a class="btn-red" href="festival/overview">Buy Tickets</a>
    </div>
</section>

<section class="history-locations">
    <h2 id="tour-stops-heading">Tour Stops</h2>

    <div id="carouselExampleControls" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <? $count = 1;
            foreach ($locations as $location) {
                ?>
                <div id="<? echo $location->getId(); ?>" class="carousel-item <? echo returnActive($count);
                   $count++; ?>">
                    <div class="d-flex justify-content-center w-100 h-100">
                        <img src="/img/<? echo $location->getImage(); ?>" class="align-middle w-30 "
                            id="carousel-history-image" alt="<? echo $location->getImage(); ?>">
                    </div>
                </div>
            <?
            } ?>
        </div>

        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn btn-primary" id="tour-carousel-prev" aria-hidden="true">
                <p class="history-carousel-arrows">&#8592 </p>
            </span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon btn btn-primary" id="tour-carousel-next" aria-hidden="true">
                <p class="history-carousel-arrows">&#8594 </p>
            </span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row">
        <div id="empty">

        </div>
        <div id="location-information">

        </div>
    </div>

<!-- History Map -->
<section class="venues">
    <div class="venues-container">
        <div id="map">
        </div>
        <div class="venues-details">
            <h1 class="map-title">Haarlem map</h1>
            <div class="information">
                <ol class="tour-locations-li">
                    <p>
                        <?php
                        foreach ($locations as $location) {
                            echo '<li>' . $location->getName() . '(' . $location->getLocation() . ')' . '</li>';
                        }
                        ?>
                    </p>
                </ol>
            </div>
        </div>
    </div>
</section>

<script>
    function initMap() {
        var location = { lat: 52.387, lng: 4.646 };
        var location1 = { lat: 52.38303958402897, lng: 4.6286939897737645 };
        var location2 = { lat: 52.38146385371384, lng: 4.636038419230462 };

        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: location
        });
        var marker1 = new google.maps.Marker({
            position: location1,
            map: map
        });
        var marker2 = new google.maps.Marker({
            position: location2,
            map: map
        });
    }      
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87xRP5re_yw-jqZE9wjTViX80gXYntHw&callback=initMap">
    </script>

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

        pargraph.classList.add("col-xl-6");
        pargraph.style.alignItems = "center";
        // img = document.createElement("img");
        // img.src = "/img/" + locationInput.img;
        location.appendChild(header);
        location.appendChild(pargraph);
        // location.appendChild(img);
    }

</script>

<?php
include __DIR__ . '/../footer.php';
?>