<?php
include __DIR__ . '/../header.php';
$contentById = [];
try{
    foreach ($contents as $content) {
        $contentById[$content->getId()] = $content->getContent();
    }
    if (empty($contentById)){
        echo '<p style="color: red; font-weight: bold;">No data in content table in database</p>';
    }
} catch (PDOException $e) {
    echo $e;
}
?> 
<div class="festival-overview-header">
    <img src="/img/festival-overview-head.png" alt="Festival Image" id="overview-header-image">
    <h1 class="title">The Haarlem Festival</h1>
    <a href="/ticket" class="btn-red" id="buy-ticket-btn">Buy Tickets</a>
    <a href="#schedule-section" class="btn-red" id="see-schedule-btn">See Schedule</a>
</div>
<div class="festival-description-block">
    <div class="white-block">
        <p class="description"><?php echo html_entity_decode($contentById[7]); ?></p>
    </div>
</div>
<!-- YUMMY -->
<section class="event-section" id="yummy-section">
    <div class="left-round" id="yummy-round">
        <img src="/img/overview-yummy.png" class="picture-left" alt="picture" id="overview-left-pic">
    </div>
    <div class="right-text" id="yummy-right"><p><?php echo html_entity_decode($contentById[8]); ?></p><a href="/yummy" class="btn-red">See event</a></div>

</section>
<!-- HISTORY -->
<section class="event-section" id="history-section">
    <div class="right-round" id="history-picture-round">
        <img src="/img/overview-history.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text" id="history-left"><p><?php echo html_entity_decode($contentById[9]); ?></p><a href="/history" class="btn-red">See event</a></div>

</section>
<!-- DANCE -->
<section class="event-section" id="dance-section">
    <img src="/img/Overview-dance-cover.png" alt="Dance Event Image" class="dance-image">
    <h1 id="dance-title">Ready to Dance?</h1>
    <a href="/dance" class="btn-purple" id="dance-event-btn">See event</a>
</section>
<!-- JAZZ -->
<section class="event-section" id="jazz-section">
<div class="left-round" id="jazz-picture-round">
    <img src="/img/overview-jazz.png" class="picture-left" alt="picture" id="overview-left-pic">
</div>
<div class="right-text"><p><?php echo html_entity_decode($contentById[10]); ?></p><a href="/jazz" class="btn-red">see event</a></div>

</section>
<!-- KIDS -->
<section class="event-section" id="kids-section">
    <div class="right-round" id="kids-picture-round">
        <img src="/img/overview-kids.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text"><p><?php echo html_entity_decode($contentById[11]); ?></p><a href="/kids" class="btn-red">see event</a></div>
</section>
<!-- SCHEDULE OVERVIEW -->
<section class="schedule-section" id="schedule-section">
    <h1 class="schedule-title">Schedule</h1>
    <div class="overview-schedule-container">
        <div class="day-card" id="thursday-card">
            <p class="date">July 27</p>
            <h3>Thursday</h3>
            <ul class="list-of-events">
                <li>JAZZ - 18:00-22:00 Patronaat</li>
                <li>A STROLL THROUGH HAARLEM - Tours at 10:00, 13:00 and 16:00 Bavo Church</li>
                <li>DANCE! - 5 Different Dance! events at different clubs around Haarlem</li>
            </ul>
        </div>
        <div class="day-card" id="friday-card">
            <p class="date">July 28</p>
            <h3>Friday</h3>
            <ul class="list-of-events">
                <li>JAZZ - 18:00-22:00 Patronaat</li>
                <li>A STROLL THROUGH HAARLEM - Tours at 10:00, 13:00 and 16:00 Bavo Church</li>
                <li>DANCE! - 4 Different Dance! events at different clubs around Haarlem</li>
            </ul>
        </div>
        <div class="day-card" id="satday-card">
            <p class="date">July 29</p>
            <h3>Saturday</h3>
            <ul class="list-of-events">
                <li>JAZZ - 18:00-22:00 Patronaat</li>
                <li>A STROLL THROUGH HAARLEM - Tours at 10:00, 13:00 and 16:00 Bavo Church</li>
                <li>DANCE! - 4 Different Dance! events at different clubs around Haarlem</li>
                <li>THE SECRETS OF PROFFESOR TEYLER -  Puzzles and Science (Kids program) Patronaat</li>
            </ul>
        </div>
        <div class="day-card" id="sunday-card">
            <p class="date">July 30</p>
            <h3>Sunday</h3>
            <ul class="list-of-events">
                <li>JAZZ - 15:00-21:00 Grote Markt (free)</li>
                <li>A STROLL THROUGH HAARLEM - Tours at 10:00, 13:00 and 16:00 Bavo Church</li>
                <li>DANCE! - 4 Different Dance! events at different clubs around Haarlem</li>
                <li>THE SECRETS OF PROFFESOR TEYLER -  Puzzles and Science (Kids program) Patronaat</li>
            </ul>
        </div>
        <div class="day-card" id="monday-card">
            <p class="date">July 31</p>
            <h3>Monday</h3>
            <ul class="list-of-events">
                <li>THE SECRETS OF PROFFESOR TEYLER -  Puzzles and Science (Kids program) Patronaat</li>
            </ul>
        </div>

    </div>
</section>

<!-- VENUES -->
<section class="venue-section">
    <div class="card">
    <div id="map">
        </div>
        <div class="venue-addresses">
            <!-- ADDRESSES HERE -->
            <ul class="venue-list">
                <li><img src="/img/dance-symbol.png" alt="dance icon"><br>Lichtfabriek (Minckelersweg 2, 2031 EM Haarlem)(09:00 - 17:00) <br> Jopenkerk (Gedempte Voldersgracht 2, 2011 WD Haarlem)(10:00 - 01:00) <br> XO the Club (Grote Markt 8, 2011 RD Haarlem)(09:00 - 04:00)</li>
                <li><img src="/img/museum-symbol.png" alt="museum icon"><br>Teylers Museum(Spaarne 16, 2011 CH Haarlem) (10:00 - 17:00)<br>Patronaat (Zijlsingel 2 2013 DN Haarlem) (18:00 - 22:00)</li>
                <li><img src="/img/jazz-symbol.png" alt="jazz icon"><br>Grote Markt, Haarlem (15:00 - 21:00)</li>
                <li><img src="/img/history-symbol.png" alt="history icon"><br>De Adriaan (Papentorenvest 1a, 2011AV Haarlem) (13:00-17:00)<br>Proveniershof (Grote Houtstraat 142D, 2011 SV Haarlem) (00:00-00:00)</li>
                <li><img src="/img/yummy-symbol.png" alt="yummy icon"><br>Ratatouille (Spaarne 96, 2011 CL Haarlem) (17:00-23:00)<br>Fris (Twijnderslaan 7, 2012 BG Haarlem) (17:30-22:00)</li>
            </ul>
        </div>
    </div>
</section>


<!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a class="arrow-up" href="#top">&#8593</a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

<script>
    function initMap() {
        var location = { lat: 52.387, lng: 4.646 };
        var location1 = { lat: 52.38646249857356, lng: 4.651785284733283 };
        var location2 = { lat: 52.38139130065097, lng: 4.629720769386906 };
        var location3 = { lat: 52.38133850935916, lng: 4.635226413569577 };
        var location4 = { lat: 52.38043621751223, lng: 4.640355527059932 };
        var location5 = { lat: 52.383057466443, lng: 4.6285929828773735 };
        var location6 = { lat: 52.381442811230166, lng: 4.636273882877305 };
        var location7 = { lat: 52.38395560046487, lng: 4.642705241757498 }; 
        var location8 = { lat: 52.377500368688786, lng: 4.630899900079037 };
        var location9 = { lat: 52.378773920717, lng: 4.637502198223354 };
        var location10 = { lat: 52.372354383879255, lng: 4.634186469386519 };


        var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: location
});

var locations = [location1, location2, location3, location4, location5, location6, location7, location8, location9, location10];
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
