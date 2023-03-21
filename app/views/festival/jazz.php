<?php
include __DIR__ . '/../header.php';
// include '/app/models/jazz.php';
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
                    $dayNumber = date('d', strtotime($date));
                    $dayName = date('D', strtotime($date));
                    ?>
                    <div class="col-sm-3">
                        <button id=<?= $jazzButtonName ?> class="button-container"
                            onclick="filterByDate('<? echo $date ?>')">
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
        <section class="cards">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div id="carousel-item-0" class="carousel-item active"></div>
                    <div id="carousel-item-1" class="carousel-item"></div>
                </div>
            </div>

            <!-- Left and right controls -->
            <div class="row">
                <div class="col-sm-11 btn-carousel">
                    <a class="carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" onclick="chgSlide()"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>

                <div class="col-sm-1 btn-carousel"><a class="carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" onclick="chgSlide()"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
</div>
</section>
</section>

<!-- </div class="containe-pages"> -->
<!-- Jazz Detailed Pages -->
<!-- <section class="pages">
    <div class="detail-pages">
        <?php
        //include __DIR__ . '/../components/page.php';
        ?>

        <?php
        //include __DIR__ . '/../components/page.php';
        ?>
    </div>
</section> -->

<!-- detail pages 1 -->
<div class="text-center container-fluid" id="detailPage">
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Hardwell</h1>
        <p class="artist-description">“Throughout his expansive career as a successful DJ, producer, remixer, label boss, filmmaker, and philanthropist, former 2 x World No.1 DJ, Hardwell has carved out a long-lasting legacy within the electronic music world.”<small><br>https://www.djhardwell.com/biography</small></p>
        <!-- <div class="artist-polaroids"> -->
          <div id="polaroid1" ><img class="polaroid-pic" src="/img/hardwell-pic-1.png" alt="pic1">
              <div class="caption"></div>
          </div>
          <div id="polaroid2"><img class="polaroid-pic" src="/img/hardwell-pic-2.png" alt="pic2">
              <div class="caption"></div>
          </div>
          <div id="polaroid3"><img class="polaroid-pic" src="/img/hardwell-pic-3.png" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
            <div><img src="/img/hardwell-song-1.png" alt="song1"><p>Power</p><small>104,227,216 streams on spotify</small></div>
            <div><img src="/img/hardwell-song-2.png" alt="song2"><p>Don't let me down</p><small>60,046,188 streams on spotify</small></div>
            <div><img src="/img/hardwell-song-3.png" alt="song3"><p>Bella Ciao</p><small>87,397,129 streams on spotify</small></div>
        </div>
        <!-- MEDIA PLAYER -->
        
        <div class="audio-player">
          <p>Power - Hardwell</p>
          <iframe width="auto" height="100px" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/343304675&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/freedownloadsmusic" title="Hardwell" target="_blank" style="color: #cccccc; text-decoration: none;">Hardwell</a> · <a href="https://soundcloud.com/freedownloadsmusic/power-original-mix" title="Hardwell &amp; KSHMR - Power" target="_blank" style="color: #cccccc; text-decoration: none;">Hardwell &amp; KSHMR - Power (Original Mix)[FREE DOWNLOAD]</a></div>
        </div>
    </div>
</div>
<!-- detail pages 2 -->
<div class="text-center container-fluid" id="detailPage">
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Martin Garrix</h1>
        <p class="artist-description">“Martijn Gerard Garritsen, known professionally as Martin Garrix, is a Dutch DJ and record producer. Active since 2012, Garrix has had a number of hits. He was also ranked number one on DJ Mag’s Top 100 DJ list in 2016, 2017, and 2018. Garrix has performed at diverse festivals like Coachella, Electric Daisy Carnival, Ultra Music Festival, and Tomorrowland.”<small><br>https://nexus.radio/news/martin-garrix</small></p>
        <!-- <div class="artist-polaroids"> -->
          <div id="polaroid1"><img class="polaroid-pic" src="/img/MG-pic-1.png" alt="pic1">
              <div class="caption"></div>
          </div>
          <div id="polaroid2"><img class="polaroid-pic" src="/img/MG-pic-2.png" alt="pic2">
              <div class="caption"></div>
          </div>
          <div id="polaroid3"><img class="polaroid-pic" src="/img/MG-pic-3.png" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
          <div><img src="/img/MG-song-1.png" alt="song1"><p>In the name of love</p><small>1,192,854,477 streams on spotify</small></div>
          <div><img src="/img/MG-song-2.png" alt="song2"><p>Scared to be lonely</p><small>1,080,844,389 streams on spotify</small></div>
          <div><img src="/img/MG-song-3.png" alt="song3"><p>Summer days</p><small>560,694,909  streams on spotify</small></div>
        </div>
        <!-- MEDIA PLAYER -->
        <div class="audio-player">
          <p>In the name of love - Martin Garrix</p>
          <iframe width="auto" height="100px" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/276648788&color=%2355b9de&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/martingarrixmusic" title="Martin Garrix" target="_blank" style="color: #cccccc; text-decoration: none;">Martin Garrix</a> · <a href="https://soundcloud.com/martingarrixmusic/in-the-name-of-love" title="In the Name of Love" target="_blank" style="color: #cccccc; text-decoration: none;">In the Name of Love</a></div>
        </div>
    </div>
</div>


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
        header.className = "card-title";
        par1.className = "card-text";
        button.className = "btn btn-primary";

        img.setAttribute("src", card.imgSource);
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

    function chgSlide() {
        element1 = document.getElementById("carousel-item-0");
        element2 = document.getElementById("carousel-item-1");

        tempClassName = element1.className;

        element1.className = element2.className;
        element2.className = tempClassName;
    }

</script>