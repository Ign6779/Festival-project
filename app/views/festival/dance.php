<?php
include __DIR__ . '/../header.php';
?>
<!-- top section with title and picture carasol -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> Dance! </h1>
    <div class="text-center container" id="carousel">
        <ul class="list">
            <li class="hide"><img src="/img/dance-carousel-1.jpg"></li>
            <li class="prev"><img src="/img/dance-carousel-2.jpg"></li>
            <li class="act"><img src="/img/dance-carousel-3.jpg"></li>
            <li class="next"><img src="/img/dance-carousel-4.jpg"></li>
            <li class="next new-next"><img src="/img/dance-carousel-5.webp"></li>
        </ul>
    </div>

<div class="swipe"></div>
</div>

<!-- detail pages 1 -->
<?php

$idForDetailPage = 25;
include __DIR__ . '/../components/page.php';
?>

<!-- detail pages 2 -->
<?php
$idForDetailPage = 27;
include __DIR__ . '/../components/page.php';
?>

<!-- schedule overview -->
<div class="text-center container-fluid" id="schedule">
    <h1 class="Dance-Title"> schedule overview </h1>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-left">FRIDAY ARTISTS
        <?php
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-27') {
                    $artists = $dance->getArtists();
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    echo "<br>". $artistNamesString;
                }
            }
        ?>
        <br>DAYPASS PRICE HERE
        </div>
        <div class="text-center container"id="artist-list-mid">SATURDAY ARTISTS
        <?php
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-28') {
                    $artists = $dance->getArtists();
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    echo "<br>". $artistNamesString;
                }
            }
        ?>
        <br>DAYPASS PRICE HERE
        </div>
        <div class="text-center container" id="artist-list-right">SUNDAY ARTIST
        <?php
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-27') {
                    $artists = $dance->getArtists();
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    echo "<br>". $artistNamesString;
                }
            }
        ?>
        <br>DAYPASS PRICE HERE
        </div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <button class="btn-purple">1 Day Pass</button>
    </div>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-right"><h3>Three day pass price</h3> <br> Get the ultimate 3-day ticket and get access to all the events listed below!
All access: €250,00</div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <button class="btn-purple" id="three-day-btn">3 Day Pass</button>
    </div>
</div>

<!-- friday tickets -->
<div class="text-center container-fluid" id="friday-schedule">
    <div class="text-right container" id="schedule-side">
        <h1 class="Dance-Title"> friday tickets </h1>
        <!-- TABLE WITH SCHEDULE -->
        <table class="table table-striped" id="table2" >
        <?php
            //HTML table
            echo "<tr><th>Start Time</th><th>Artist</th><th>Venue</th><th>Price</th></tr>";
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-27') {
                    // to display artist objects name as string
                    $artists = $dance->getArtists();
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    // display dance events
                    echo "<tr>";
                    echo "<td>" . $dance->getStartTime() . "</td>";
                    echo "<td>" . $artistNamesString . "</td>";
                    echo "<td>" . $dance->getVenue()->getName() . "</td>";
                    echo "<td> € ".number_format($dance->getPrice(), 2) . "</td>";
                    echo "</tr>";
                }
                }
        ?>
        </table>
        <div class="text-center container justify-content-center">
            <button class="btn-purple">Get a Ticket</button>
        </div>
    </div>
    <div class="text-left container" id="green-side-with-picture">
        <img src="/img/dance-pic-1.png" class="pictures" alt="picture">
    </div>
</div>

<!-- saturday tickets -->
<div class="text-center container-fluid" id="saturday-schedule">
  <div class="text-right container" id="white-side-with-picture">
            <img src="/img/dance-pic-2.png" class="picture-left" alt="picture">
        </div>
    <div class="text-left container" id="schedule-side">
            <h1 class="Dance-Title"> saturday tickets </h1>
            <!-- TABLE WITH SCHEDULE -->
            <table class="table table-striped" >
        <?php
            //HTML table
            echo "<tr><th>Start Time</th><th>Artist</th><th>Venue</th><th>Price</th></tr>";
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-28') {
                    $artists = $dance->getArtists(); // assuming this method returns an array of Artist objects
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    // Loop through each row in the result set and display the data in the table
                    echo "<tr>";
                    echo "<td>" . $dance->getStartTime() . "</td>";
                    echo "<td>" . $artistNamesString . "</td>";
                    echo "<td>" . $dance->getVenue()->getName() . "</td>";
                    echo "<td> € ".number_format($dance->getPrice(), 2) . "</td>";
                    echo "</tr>";
                }
                }
        ?>
            </table>
            <div class="text-center container justify-content-center">
                <button class="btn-purple">Get a Ticket</button>
            </div>
        </div>
    </div>
</div>

<!-- sunday tickets -->
<div class="text-center container-fluid" id="saturday-schedule">
    <div class="text-right container" id="schedule-side">
        <h1 class="Dance-Title"> Sunday tickets </h1>
        <!-- TABLE WITH SCHEDULE -->
        <table class="table table-striped" >
        <?php
            //HTML table
            echo "<tr><th>Start Time</th><th>Artist</th><th>Venue</th><th>Price</th></tr>";
            foreach ($danceEvents as $dance) {
                if (date('Y-m-d', strtotime($dance->getDate())) === '2023-07-29') {
                    $artists = $dance->getArtists(); // assuming this method returns an array of Artist objects
                    $artistNames = array_map(function($artist) {
                        return $artist->getName();
                    }, $artists);

                    $artistNamesString = implode(', ', $artistNames);
                    // Loop through each row in the result set and display the data in the table
                    echo "<tr>";
                    echo "<td>" . $dance->getStartTime() . "</td>";
                    echo "<td>" . $artistNamesString . "</td>";
                    echo "<td>" . $dance->getVenue()->getName() . "</td>";
                    echo "<td> € ".number_format($dance->getPrice(), 2) . "</td>";
                    echo "</tr>";
                }
                }
        ?>
        </table>
        <div class="text-center container justify-content-center">
            <button class="btn-purple">Get a Ticket</button>
        </div>
    </div>
    <div class="text-left container" id="white-side-with-picture-left">
        <img src="/img/dance-pic-3.png" class="pictures" alt="picture">
    </div>
</div>

<!-- venues -->
<div class="text-center container-fluid" id="venue-section">
    <div class="card">
    <h1> venues </h1>
    <div class="card-body" style="float: left;">
        venues here
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.4373439418973!2d4.637868015802284!3d52.38062167978804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5ef691268e66d%3A0xfa51f5aae7c4d62d!2sTeylers%20Museum!5e0!3m2!1snl!2snl!4v1677013723273!5m2!1snl!2snl"
            width="500px" height="500px" style="border:2px solid black; margin-right:2%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p >e-mail:
            info@teyeler.nl <br>
            phone:
            023 - 517 58 50 (office)<br>
            <b>open from 10.00 - 17.00 </b>
        </p>
    </div>
    </div>
</div>

<!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a class="arrow-up" href="#top">&#8593</a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

 <!-- FUNCTIONALITY FOR CAROUSEL -->
<script>
    const $ = selector => {
  return document.querySelector(selector);
};

function next() {
  if ($(".hide")) {
    $(".hide").remove(); 
  }

  /* Step */

  if ($(".prev")) {
    $(".prev").classList.add("hide");
    $(".prev").classList.remove("prev");
  }

  $(".act").classList.add("prev");
  $(".act").classList.remove("act");

  $(".next").classList.add("act");
  $(".next").classList.remove("next");

  /* New Next */

  $(".new-next").classList.remove("new-next");

  const addedEl = document.createElement('li');

  $(".list").appendChild(addedEl);
  addedEl.classList.add("next","new-next");
}

function prev() {
  $(".new-next").remove();
    
  /* Step */

  $(".next").classList.add("new-next");

  $(".act").classList.add("next");
  $(".act").classList.remove("act");

  $(".prev").classList.add("act");
  $(".prev").classList.remove("prev");

  /* New Prev */

  $(".hide").classList.add("prev");
  $(".hide").classList.remove("hide");

  const addedEl = document.createElement('li');

  $(".list").insertBefore(addedEl, $(".list").firstChild);
  addedEl.classList.add("hide");
}

slide = element => {
  /* Next slide */
  
  if (element.classList.contains('next')) {
    next();
    
  /* Previous slide */
    
  } else if (element.classList.contains('prev')) {
    prev();
  }
}

const slider = $(".list"),
      swipe = new Hammer($(".swipe"));

slider.onclick = event => {
  slide(event.target);
}

swipe.on("swipeleft", (ev) => {
  next();
});

swipe.on("swiperight", (ev) => {
  prev();
});

