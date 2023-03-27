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


    <div id="location-information">

    </div>

</section>
<section class="tour-map">
    <img src="/img/history-map.png" alt="map of tour locations" id="history-tour-map" />
    <div class="tour-locations">
        <h2>Tour Locations</h2>
        <ol class="tour-locations-li">
            <?php
            foreach ($locations as $location) {
                echo '<li>' . $location->getName() . '(' . $location->getLocation() . ')' . '</li>';
            }
            ?>
        </ol>
    </div>
</section>

<!-- start of ticekt -->
<aside class="filter_events">

<fieldset id="filter_event_type">
    <legend>Select event</legend>

    <div>
      <input type="radio" id="filter_yummy" name="event_type" value="filter_yummy">
      <label for="filter_yummy">Yummy</label>
    </div>
    <div>
      <input type="radio" id="filter_dance" name="event_type" value="filter_dance">
      <label for="filter_dance">Dance</label>
    </div>
    <div>
      <input type="radio" id="filter_history" name="event_type" value="filter_history">
      <label for="filter_history">History</label>
    </div>
    <div>
      <input type="radio" id="filter_jazz" name="event_type" value="filter_jazz">
      <label for="filter_jazz">Jazz</label>
    </div>
    
</fieldset>

<fieldset id="filter_event_date">
    <legend>Select date</legend>

    <div>
      <input type="radio" id="filter_26" name="event_date" value="filter_26">
      <label for="filter_26">July 26th</label>
    </div>
    <div>
      <input type="radio" id="filter_27" name="event_date" value="filter_27">
      <label for="filter_27">July 27th</label>
    </div>
    <div>
      <input type="radio" id="filter_28" name="event_date" value="filter_28">
      <label for="filter_28">July 28th</label>
    </div>
    <div>
      <input type="radio" id="filter_29" name="event_date" value="filter_29">
      <label for="filter_29">July 29th</label>
    </div>
    
</fieldset>
</aside>

<!-- end of ticket -->
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
        // img = document.createElement("img");
        // img.src = "/img/" + locationInput.img;
        location.appendChild(header);
        location.appendChild(pargraph);
        // location.appendChild(img);
    }


    // beginning of ticket script


    document.getElementsById("filter_event_date").addEventListener("click",(e)=>{
        switch(e.target.getAttribute("id")){
          case 'filter_26':
                alert("26th")
                break;
            case 'filter_27':
                alert("27th")
                break;
            case 'filter_28':
                alert("28th")
                break;
            case 'filter_29':
                alert("29th")
                break;
        }
    })
    // end of ticket script

</script>

<?php
include __DIR__ . '/../footer.php';
?>