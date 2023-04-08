<?php
include __DIR__ . '/../header.php';
?>
<!-- top section with title and picture carasol -->
<div class="text-center container-fluid" id="top-section">
    <!-- <h1 class="Dance-Title"> Dance! </h1> -->
    <img src="/img/dancelogo.png" alt="DANCE" class="dance-logo">
</div>

<!-- Carousel -->
<div class="carousel" data-carousel="1" data-speed="2000">
  <span class="carousel-control-left"></span>
  <span class="carousel-control-right"></span>
  <div class="carousel-content">
    <!-- add extra last pic first and extra first pic last for hover effect to work properly  -->
    <!-- <img src="/img/dance-carousel-1.jpg" alt="image 5" /> -->
    <!-- <img src="/img/dance-carousel-2.jpg" alt="image 1" /> -->
    <!-- <img src="/img/dance-carousel-4.jpg" alt="image 3" /> -->
    <img src="/img/dance-carousel-5.webp" alt="image 4" />
    <img src="/img/dance-carousel-5.jpg" alt="image 6" />
    <img src="/img/dance-carousel-6.webp" alt="image 7" />
    <img src="/img/dance-carousel-7.jpg" alt="image 8" />
    <img src="/img/dance-carousel-8.jpg" alt="image 9" />
    <img src="/img/dance-carousel-3.jpg" alt="image 2" />
    <img src="/img/dance-carousel-9.jpg" alt="image 10" />
  </div>
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
        <a href="/ticket" class="btn-purple">1 Day Pass</a>
    </div>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-right"><h3>Three day pass price</h3> <br> Get the ultimate 3-day ticket and get access to all the events listed below!
All access: €250,00</div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <a href="/ticket" class="btn-purple" id="three-day-btn">3 Day Pass</a>
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
        <div class="text-center justify-content-center">
            <a href="/ticket" class="btn-purple">Get a Ticket</a>
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
            <div class="text-center justify-content-center">
                <a href="/ticket" class="btn-purple">Get a Ticket</a>
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
        <div class="text-center justify-content-center">
            <a href="/ticket" class="btn-purple">Get a Ticket</a>
        </div>
    </div>
    <div class="text-left container" id="white-side-with-picture-left">
        <img src="/img/dance-pic-3.png" class="pictures" alt="picture">
    </div>
</div>

<!-- venues -->
<section class="venues">
    <div class="venues-container">
        <div id="map">
        </div>
        <div class="venues-details">
            <h1 class="map-title">Haarlem map</h1>
            <div class="locations">
                <p class="map-text">Club Stalker</p>
                <p class="map-text">Caprera Openluchttheater </p>
                <p class="map-text">Jopenkerk</p>
                <p class="map-text">Lichtfabriek</p>
                <p class="map-text">Club Ruis</p>
                <p class="map-text">XO the Club</p>
            </div>
        </div>
    </div>
</section>
<script>
    function initMap() {
        var location = { lat: 52.387, lng: 4.646 };
        var location1 = { lat: 52.38242045263527, lng: 4.634314196367745 };
        var location2 = { lat: 52.413872340092304, lng: 4.60728320157679 };
        var location3 = { lat: 52.38139130065097, lng: 4.629720769386906 };
        var location4 = { lat: 52.38646249857356, lng: 4.651785284733283 };
        var location5 = { lat: 52.382369947943666, lng: 4.636397355896557 };
        var location6 = { lat: 52.38133850935916, lng: 4.635226413569577 };

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
        var marker3 = new google.maps.Marker({
            position: location3,
            map: map
        });
        var marker4 = new google.maps.Marker({
            position: location4,
            map: map
        });
        var marker5 = new google.maps.Marker({
            position: location5,
            map: map
        });
        var marker6 = new google.maps.Marker({
            position: location6,
            map: map
        });
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87xRP5re_yw-jqZE9wjTViX80gXYntHw&callback=initMap">
    </script>

<!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a class="arrow-up" href="#top">&#8593</a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
<!-- Carousel functionality -->
<script>
if (document.querySelectorAll(".carousel").length > 0) {
  let carousels = document.querySelectorAll(".carousel");
  carousels.forEach(carousel => newCarousel(carousel));

  function newCarousel(carousel) {
    let carouselChildren = document.querySelector(
      `.carousel[data-carousel="${carousel.dataset.carousel}"]`
    ).children;
    let speed = carousel.dataset.speed;
    let carouselContent = document.querySelectorAll(`.carousel-content`)[
      carousel.dataset.carousel - 1
    ];
    const carouselLength = carouselContent.children.length;
    let width = window.innerWidth;
    let count = width;
    let counterIncrement = width;
    let int = setInterval(timer, speed);

    // initial transform
    carouselContent.style.transform = `translateX(-${width}px)`;

    function timer() {
      if (count >= (counterIncrement - 2) * (carouselLength - 2)) {
        count = 0;
        carouselContent.style.transform = `translateX(-${count}px)`;
      }
      count = count + counterIncrement;
      carouselContent.style.transform = `translateX(-${count}px)`;
    }

    function carouselClick() {
      // left click
      carouselChildren[0].addEventListener("click", function() {
        count = count - width;
        carouselContent.style.transform = `translateX(-${count - 100}px)`;
        if (count < counterIncrement) {
          count = counterIncrement * (carouselLength - 2);
          carouselContent.style.transform = `translateX(-${count - 100}px)`;
        }
      });
      // right click
      carouselChildren[1].addEventListener("click", function() {
        count = count + width;
        carouselContent.style.transform = `translateX(-${count + 100}px)`;
        if (count >= counterIncrement * (carouselLength - 1)) {
          count = counterIncrement;
          carouselContent.style.transform = `translateX(-${count + 100}px)`;
        }
      });
    }

    function carouselHoverEffect() {
      // left hover effect events
      carouselChildren[0].addEventListener("mouseenter", function() {
        carouselContent.style.transform = `translateX(-${count - 100}px)`;
        clearInterval(int);
      });
      carouselChildren[0].addEventListener("mouseleave", function() {
        carouselContent.style.transform = `translateX(-${count}px)`;
        int = setInterval(timer, speed);
      });

      // right hover effect events
      carouselChildren[1].addEventListener("mouseenter", function() {
        carouselContent.style.transform = `translateX(-${count + 100}px)`;
        clearInterval(int);
      });
      carouselChildren[1].addEventListener("mouseleave", function() {
        carouselContent.style.transform = `translateX(-${count}px)`;
        int = setInterval(timer, speed);
      });
    }

    carouselHoverEffect();
    carouselClick();
  }
}
</script>