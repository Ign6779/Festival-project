<?php
include __DIR__ . '/../header.php';
$danceArtists = [];
foreach ($artists as $artist) {
    if($artist->getType() == 'dance'){
        $danceArtists[$artist->getId()] = $artist;
    }
} 
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
<h2 class="detail-page-title">Artist Information Pages</h2>
<div class="tab">
    <?php foreach ($danceArtists as $artist) { ?>
        <button class="tablinks" onclick="openDetailPage(<?php echo $artist->getId(); ?>)"><?php echo $artist->getName(); ?></button>
    <?php } ?>
</div>

<?php foreach ($danceArtists as $artist) { ?>
    <div id="<?php echo $artist->getId(); ?>" class="tabcontent" style="display:none;">
        <?php 
        $idForDetailPage = $artist->getId();
        include __DIR__ . '/../components/page.php'; ?>
    </div>
<?php } ?>

<script>
function openDetailPage(artistID) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(artistID).style.display = "block";
  // evt.currentTarget.className += " active"; // commented out as evt is not defined
}
</script>




<!-- schedule overview -->
<div class="text-center container-fluid" id="schedule">
    <!-- <h1 class="Dance-Title"> schedule overview </h1> -->
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-left"><h3><b>FRIDAY ARTISTS</b></h3>
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
        </div>
        <div class="text-center container"id="artist-list-mid"><h3><b>SATURDAY ARTISTS</b></h3>
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
        </div>
        <div class="text-center container" id="artist-list-right"><h3><b>SUNDAY ARTIST</b></h3>
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
        </div>
    <div class="text-center container" id="three-day-section">
        <div class="text-center container" id="artist-list-right"><h3><b>THREE DAY PASS</b></h3> <br> <p>Get the ultimate 3-day ticket and get access to all the events listed below!
All access: €250,00</p>    <div class="text-center container justify-content-center">
        <a href="/ticket" class="btn-purple" id="three-day-btn">3 Day Pass</a>
    </div></div>
    </div>
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

var locations = [location1, location2, location3, location4, location5, location6];
var markers = [];

for (var i = 0; i < locations.length; i++) {
    var marker = new google.maps.Marker({
        position: locations[i],
        map: map
    });
    markers.push(marker);
}

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