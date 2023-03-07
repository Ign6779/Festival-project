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

<style>
    .title{
        top: 40%;
        left: 40%;
        position: absolute;
        color: white;
    }
    .festival-overview-header{
        height: 100%;
        align-items: center;
    }
    #buy-ticket-btn{
        position: absolute;
        top: 65%;
        left: 45%;
    }
    #see-schedule-btn{
        position: absolute;
        top: 80%;
        left: 45%;
    }
    #overview-header-image{
        width: 100%;
        height: auto;
        opacity: 95%;
    }
    .event-section{
        height: 550px;
        width: 100%;
        margin: 0px;
    }
    #yummy-section{
        display: inline-block;
        background-color: rgb(	158, 173, 234, 60%);
    }
    .festival-description-block{
        background-color: rgb(	158, 173, 234, 60%);
        position: relative;
        height: 400px;
    }
    .white-block{
        width: 80%;
        height: 80%;
        background: rgba(244, 237, 237, 0.3);
        display: inline-flex;
        flex-wrap: wrap;
        position: absolute;
        left: 10%;
        top: 10%; 
        align-content: center; 
        text-align: center;
        padding: 5%;          
    }
    .description{
        font-weight: bold;
        float: right;
        margin-left: 15%;
    }
    .right-text{
        align-content: center;
        float: left;
        margin-top: 5%;
        padding: 5%;
        width: 50%;
        height: 100%;
        position: relative;
    }
    .left-round{
        height: 100%;
        position: relative;
        width: 50%;
        border-radius: 26% 40% 40% 26% / 0% 50% 50% 0%;
        margin: 0px;
        float: left;
    }
    .right-round{
        height: 100%;
        position: relative;
        width: 50%;
        border-radius: 36% 25% 25% 37% / 49% 0% 0% 50%;
        margin: 0px;
        float: right;
    }
    #yummy-round{
        background-color: #2E9B7B;
    }
    .left-text{
        align-content: center;
        float: left;
        margin-top: 5%;
        padding: 5%;
        width: 50%;
        height: 100%;
        position: relative;
    }

    #history-section{
        background-color: #2E9B7B;
    }
    #history-picture-round{
        background-color: rgb(	158, 173, 234, 80%)
    }
    #dance-section{
        position: relative;
    }
    #dance-title{
        position: absolute;
        top: 50%;
        width: 100%;
        text-align: center;
        color: white;
    }
    #dance-event-btn{
        position: absolute;
        top: 70%;
        left: 45%;
    }
    .dance-image{
        opacity: 85%;
        top: 0;
    }
    #jazz-section{
        background-color: #7A86B6;
        position: relative;
    }
    #jazz-picture-round{
        background-color: white;
    }
    #kids-section{
        position: relative;
        background-color: white;
    }
    #kids-picture-round{
        background-color: #7A86B6;
    }
    
</style>