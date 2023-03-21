<?php
include __DIR__ . '/../header.php';
?>
<!-- Header of the jazz page -->
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
                    ?>
                    <div class="col-sm-3">
                        <button id=<?= $jazzButtonName ?>  class="button-container"
                            onclick="changeButtonStyle(<?= array_search($date, $dates); ?>)">
                            <h3>Thu</h3>
                            <h5>26th</h5>
                        </button>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Jazz Cards -->
        <section class="cards">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="cards-wrapper">
                            <div class="card">
                                <img id="card-0" class="card-img-top" src="/img/jazz-9-gumbo-kings.png"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/jazz-10-evolve.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/jazz-11-ntjam-rosie.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="cards-wrapper">
                            <div class="card">
                                <img class="card-img-top" src="/img/jazz-12-jonna-fraser.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/jazz-13-thomson-assemble.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/jazz-14-wicked-jazz-sounds.png"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Buy ticket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <div class="row">
                    <div class="col-sm-11 btn-carousel">
                        <a class="carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>

                    <div class="col-sm-1 btn-carousel"><a class="carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </section>

</div class="containe-pages">
<!-- Jazz Detailed Pages -->
<section class="pages">
    <div class="detail-pages">
        <?php
        include __DIR__ . '/../components/page.php';
        ?>

        <?php
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
            more details about the locations
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
    // Functions

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
        // document.getElementById(nameOfTheButton).onmouseout = function() { mouseOut(nameOfTheButton, '#2E9B7B')};
        // document.getElementById(nameOfTheButton).onmouseover = function() { mouseOver(nameOfTheButton)};
        document.getElementById(nameOfTheButton).style.color = "#111D4A";
    }

    // function mouseOver(nameOfTheButton) {
    //     document.getElementById(nameOfTheButton).style.background = "#CB8803";
    // }

    // function mouseOut(nameOfTheButton, color) {
    //     document.getElementById(nameOfTheButton).style.background = color;
    // }

</script>