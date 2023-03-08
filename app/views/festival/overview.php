<?php
include __DIR__ . '/../header.php';
?>
<div class="festival-overview-header">
    <img src="/img/festival-overview-head.png" alt="Festival Image" id="overview-header-image">
    <h1 class="title">The Haarlem Festival</h1>
    <button class="btn-red" id="buy-ticket-btn">Buy Tickets</button>
    <button class="btn-red" id="see-schedule-btn">See Schedule</button>
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

    </div>
    <div class="right-text" id="yummy-right"><p>text</p><button class="btn-red">see event</button></div>

</section>
<!-- HISTORY -->
<section class="event-section" id="history-section">
    <div class="right-round" id="history-picture-round">

    </div>
    <div class="left-text" id="history-left"><p>text</p><button class="btn-red">see event</button></div>

</section>
<!-- DANCE -->
<section class="event-section" id="dance-section">
    <img src="/img/Overview-dance-cover.png" alt="Dance Event Image" class="dance-image">
    <h1 id="dance-title">Ready to Dance?</h1>
    <button class="btn-purple" id="dance-event-btn">see event</button>
</section>
<!-- JAZZ -->
<section class="event-section" id="jazz-section">
<div class="left-round" id="jazz-picture-round">

</div>
<div class="right-text"><p>text</p><button class="btn-red">see event</button></div>

</section>
<!-- KIDS -->
<section class="event-section" id="kids-section">
    <div class="right-round" id="kids-picture-round">

    </div>
    <div class="left-text"><p>text</p><button class="btn-red">see event</button></div>
</section>
<!-- SCHEDULE OVERVIEW -->
<section class="schedule-section">
    <h1 class="schedule-title">Schedule</h1>
    <div class="overview-schedule-container">
        <div class="day-card" id="thursday-card">
            <p class="date">July 27</p>
            <h3>Thursday</h3>
            <ul class="list-of-events">
                <li></li>
            </ul>
        </div>
        <div class="day-card" id="friday-card">
            <p class="date">July 28</p>
            <h3>Friday</h3>
            <ul class="list-of-events">
                <li></li>
            </ul>
        </div>
        <div class="day-card" id="satday-card">
            <p class="date">July 29</p>
            <h3>Saturday</h3>
            <ul class="list-of-events">
                <li></li>
            </ul>
        </div>
        <div class="day-card" id="sunday-card">
            <p class="date">July 30</p>
            <h3>Sunday</h3>
            <ul class="list-of-events">
                <li></li>
            </ul>
        </div>
        <div class="day-card" id="monday-card">
            <p class="date">July 31</p>
            <h3>Monday</h3>
            <ul class="list-of-events">
                <li></li>
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
<?php
include __DIR__ . '/../footer.php';
?>
