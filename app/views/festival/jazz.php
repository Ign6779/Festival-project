<?php
include __DIR__ . '/../header.php';
?>
<?php
include __DIR__ . '/../components/shareButtons.php';
?>
<div>
    <section class="jazz-header">
        <img class="img-responsive" src="/img/jazz-1-background.png" alt="Jazz">
        <img class="jazz-logo" src="/img/jazz-8-logo.png" alt="jazz">
        <button class="btn-jazz">Buy ticket!</button>

        <div>
            <div class="section-1">
                <h1>Haarlem Jazz & More</h1>
            </div>
            <div class="section-2"></div>
            <div class="section-3">
                <p>The City of Haarlem values Haarlem Jazz as a significant musical
                    occasion. We want to replicate a portion of this festival during
                    the Haarlem festival, therefore we've invited some of the bands
                    who have previously played there to play at the Patronaat. Some
                    of the bands will perform on Sunday to the large stage of the
                    Grote Markt to give a free performance for all guests!</p>
            </div>
        </div>
    </section>
</div>


<!-- Jazz Schedule -->
<div>
    <section class="jazz-schedule">
        <div class="jazz-title">
            <h1>Haarlem Jazz</h1>
            <p>26 July 2023 - 29 July 2023</p>
        </div>

        <div class="dates">
            <div class="row">
                <p>select date</p>
            </div>
            <div class="row">
                <?php foreach ($dates as $date) {
                    $jazzButtonName = "jazz-button-" . array_search($date, $dates);
                    $dayNumber = date('d', strtotime($date));
                    $dayName = date('D', strtotime($date));
                    ?>
                    <div class="col-sm-3">
                        <button id=<?= $jazzButtonName ?> class="button-container"
                            onclick="filterByDate('<? echo $date; ?>')">
                            <h3>
                                <? echo $dayNumber; ?>
                            </h3>
                            <h5>
                                <? echo $dayName; ?>
                            </h5>
                        </button>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Jazz Cards -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div id="carousel-item-0" class="carousel-item active"></div>
                <div id="carousel-item-1" class="carousel-item"></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
</div>


</div class="containe-pages">
<!-- Jazz Detailed Pages -->
<section class="pages">
    <div class="detail-pages">
        <?php
        $idForDetailPage = 6;
        include __DIR__ . '/../components/page.php';
        ?>
        <?php
        $idForDetailPage = 3;
        include __DIR__ . '/../components/page.php';
        ?>
    </div>
</section>

<!-- Jazz Map -->
<section class="venues">
    <div class="venues-container">
        <div id="map">
        </div>
        <div class="venues-details">
            <h1 class="map-title">Haarlem map</h1>
            <div class="locations">
                <p class="map-text">Haarlem, Station Ingang, Haarlem</p>
                <p class="map-text">Grote Markt, Haarlem</p>
                <p class="map-text">Patronaat Zijlsingel 2 2013 DN Haarlem</p>
            </div>
            <div class="information">
                <p>e-mail: info@patronaat.nl </p>
                <p>phone: 023 - 517 58 50 (office) - during</p>
                <p>office hours 10.00 u - 17.00 u</p>
                <p>023 - 517 58 58 cash desk </p>
                <p>information number</p>
            </div>
        </div>
    </div>
</section>

<section class="footer">
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</section>
</div>
</div>

<!-- pointer to the top of the page -->
<div class="pointer-to-top">
    <a class="arrow-up" href="#top">&#8593</a>
</div>

</body>

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
    filterByDate('2023-07-26');

    function changeButtonStyle(number) {

        const string = "jazz-button-";

        for (let i = 0; i < 4; i++) {
            let nameOfTheButton = string.concat(i.toString());
            if (i == number)
                addCssStyle(nameOfTheButton);
            else
                resetCssStyle(nameOfTheButton);
        }
    }

    function addCssStyle(nameOfTheButton) {
        document.getElementById(nameOfTheButton).style.borderColor = "white";
        document.getElementById(nameOfTheButton).style.background = "#2E9B7B";
        document.getElementById(nameOfTheButton).style.color = "white";
    }

    function resetCssStyle(nameOfTheButton) {
        document.getElementById(nameOfTheButton).style.borderColor = "#111D4A";
        document.getElementById(nameOfTheButton).style.background = "white";
        document.getElementById(nameOfTheButton).style.color = "#111D4A";
    }

    function filterByDate(date) {
        var index = <?php echo json_encode($dates); ?>.indexOf(date);
        changeButtonStyle(index);

        fetch('http://localhost/api/jazz/getByDate?date=' + date, {
            method: 'GET'
        })
            .then(result => result.json())
            .then((data) => {
                middleIndex = Math.floor(data.length / 2);

                firstHalf = data.slice(0, middleIndex);
                secondHalf = data.slice(middleIndex);

                console.log(data);

                var carouselActive = document.getElementsByClassName("carousel-item")[0];
                var carouselInactive = document.getElementsByClassName("carousel-item")[1];

                carouselActive.innerHTML = "";
                carouselInactive.innerHTML = "";

                var divCardW1 = document.createElement("div");
                var divCardW2 = document.createElement("div");

                divCardW1.className = "cards-wrapper";
                divCardW2.className = "cards-wrapper";

                carouselActive.appendChild(divCardW1);
                firstHalf.forEach((card, i) => load(card, 0));

                carouselInactive.appendChild(divCardW2);
                secondHalf.forEach((card, i) => load(card, 1));
                console.log(data);
            })
            .catch(err => console.error(err));
    }


    function load(card, i) {
        var carousel = document.getElementsByClassName("cards-wrapper")[i];

        divCard = document.createElement("div");
        divCardBody = document.createElement("div");
        header = document.createElement("h5");
        par1 = document.createElement("p");
        par = document.createElement("p");
        img = document.createElement("img");
        button = document.createElement("a");

        divCard.className = "card";
        divCardBody.style.height = "320px";
        divCardBody.className = "card-body";
        img.className = "card-img-top";
        img.height = 140;
        header.className = "card-title";
        par1.className = "card-text";
        button.className = "btn btn-primary";

        img.setAttribute("src", `/img/${card.imgSource}`);
        header.innerHTML = "<b>" + card.artists[0].name + "</b>";
        par1.innerHTML = card.artists[0].description;
        par1.innerHTML += "<br> time: " + card.startTime + " - " + card.endTime;
        button.innerHTML = "But ticket";

        divCardBody.appendChild(header);
        divCardBody.appendChild(par1);
        divCardBody.appendChild(button);

        divCard.appendChild(img);
        divCard.appendChild(divCardBody);

        carousel.appendChild(divCard);
    }
</script>