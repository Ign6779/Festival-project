<?php
include __DIR__ . '/../header.php';
?>
    <?php
        include __DIR__ . '/../components/shareButtons.php';
    ?>  
<div class="festival-overview-header">
    <img src="/img/festival-overview-head.png" alt="Festival Image" id="overview-header-image">
    <h1 class="title">The Haarlem Festival</h1>
    <a href="/ticket" class="btn-red" id="buy-ticket-btn">Buy Tickets</a>
    <a href="#schedule-section" class="btn-red" id="see-schedule-btn">See Schedule</a>
</div>
<div class="festival-description-block">
    <div class="white-block">
        <p class="description">The Haarlem Festival is suitable for anyone and everyone. No matter your tastes, age or nationality.</p> <br>
        <p >Check out our local artists at the jazz event, learn about Haarlem history, enjoy a personalized eating experience or dance the night away! We also have a fun experience for the younger ones: an exciting treasure hunt at the acclaimed Teylers museum!</p>
    </div>
</div>
<!-- YUMMY -->
<section class="event-section" id="yummy-section">
    <div class="left-round" id="yummy-round">
        <img src="/img/overview-yummy.png" class="picture-left" alt="picture" id="overview-left-pic">
    </div>
    <div class="right-text" id="yummy-right"><p><h1>Yummy!</h1><br>If you want to celebrate a festival, you have to do it on a full stomach! Restaurants all over Haarlem have joined to create a special menu for the occasion. Being such an international city, you are sure to enjoy your evening, whether it be with your family or on a romantic dinner with your partner!</p><a href="/yummy" class="btn-red">See event</a></div>

</section>
<!-- HISTORY -->
<section class="event-section" id="history-section">
    <div class="right-round" id="history-picture-round">
        <img src="/img/overview-history.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text" id="history-left"><p><h1>Historical walk</h1> <br>Visit Haarlem’s most beautiful sights and get to learn more about it’s rich and interesting history. Join an informational tour throughout the city today!</p><a href="/history" class="btn-red">See event</a></div>

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
<div class="right-text"><p><h1>Haarlem Jazz</h1><br>Annually, the Grote Markt in the heart of the historic capital of Haarlem hosts the concert series known as Haarlem Jazz. Both well-known and unknown Dutch musicians will perform for the audience's amazement. We're here waiting for you.</p><a href="/jazz" class="btn-red">see event</a></div>

</section>
<!-- KIDS -->
<section class="event-section" id="kids-section">
    <div class="right-round" id="kids-picture-round">
        <img src="/img/overview-kids.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text"><p><h1>Teylers Museum</h1><br> In this event, children play and learn while solving the mystery of the event. Teylers museum contains ancient and fascinating artefacts that will amaze everyone. </p><a href="/kids" class="btn-red">see event</a></div>
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
        <div class="venue-map-container">
            <!-- MAP HERE -->
            <img src="" alt="" class="map">
        </div>
        <div class="venue-addresses">
            <!-- ADDRESSES HERE -->
            <ul class="venue-list">
                <li><img src="/img/dance-symbol.png" alt="dance icon"><br>Lichtfabriek (Minckelersweg 2, 2031 EM Haarlem)
                    (09:00 - 17:00) <br> Jopenkerk (Gedempte Voldersgracht 2, 2011 WD Haarlem)
                    (10:00 - 01:00) <br> XO the Club (Grote Markt 8, 2011 RD Haarlem)
                    (09:00 - 04:00)</li>
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
