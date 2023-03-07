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
<?php
include __DIR__ . '/../footer.php';
?>
