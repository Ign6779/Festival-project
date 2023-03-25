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
    <!-- <img src="/img/dance-carousel-5.webp" alt="image 4" /> -->
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