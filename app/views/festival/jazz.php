<?php
include __DIR__ . '/../header.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jazz page</title>
    <link rel="stylesheet" href="/css/jazz.css">
</head>

<body>
    <div>
        <!-- Header of the jazz page -->
        <section class="jazz-header">
            <img src="/img/jazz-1.png" alt="Jazz">
            <img class="jazz-logo" src="/img/jazz-logo.png" alt="jazz">
            <button class="btn-jazz">Buy ticket!</button>

            <div>
                <div class="section-1">
                    <h1>Haarlem Jazz & More</h1>
                </div>
                <div class="section-2"></div>
                <div class="section-3">
                    <p>
                    The City of Haarlem values Haarlem Jazz as a significant musical 
                    occasion. We want to replicate a portion of this festival during the 
                    Haarlem festival, therefore we've invited some of the bands who have 
                    previously played there to play at the Patronaat. Some of the bands 
                    will perform on Sunday to the large stage of the Grote Markt to give 
                    a free performance for all guests!
                    </p>
                </div>
            </div>
        </section>
    </div>

    <section class="jazz-schedule">
        <div class="title">
            <h1>Haarlem Jazz</h1>
            <p>26 July 2023 - 29 July 2023</p>
        </div>

        <div class="dates">
            <p>select date</p>
            <button class="flex-container">Date</button>
            <button class="flex-container">Date</button>
            <button class="flex-container">Date</button>
            <button class="flex-container">Date</button>
        </div>

        <div class="cards">
            <p></p>
        </div>
    </section>

</body>
<?php
include __DIR__ . '/../footer.php';
?>