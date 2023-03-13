<?php
include __DIR__ . '/../header.php';
?>
<!-- Header of the jazz page -->
<div>
    <section class="jazz-header">
        <img class="img-responsive" src="/img/jazz-1.png" alt="Jazz">
        <img class="jazz-logo" src="/img/jazz-logo.png" alt="jazz">
        <button class="btn-jazz">Buy ticket!</button>

        <div>
            <div class="section-1">
                <h1>Haarlem Jazz & More</h1>
            </div>
            <div class="section-2"></div>
            <div class="section-3">
                <p></p>
            </div>
        </div>
    </section>
</div>


<!-- Jazz Schedule -->
<div>
    <section class="jazz-schedule">
        <div class="title">
            <h1>Haarlem Jazz</h1>
            <p>26 July 2023 - 29 July 2023</p>
        </div>

        <div class="dates">
            <div class="row">
                <p>select date</p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button class="button-container">Date</button>
                </div>
                <div class="col-sm-3">
                    <button class="button-container">Date</button>
                </div>
                <div class="col-sm-3">
                    <button class="button-container">Date</button>
                </div>
                <div class="col-sm-3">
                    <button class="button-container">Date</button>
                </div>
            </div>
        </div>

        <!-- Jazz Cards -->
        <div class="cards">
            <div class="row">
                <button class="col-sm-3">next</button>
                <div class="col-sm-2">
                    <?php
                    include __DIR__ . '/../components/card.php';
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php
                    include __DIR__ . '/../components/card.php';
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php
                    include __DIR__ . '/../components/card.php';
                    ?>
                </div>
                <button class="col-sm-3">next</button>
            </div>
        </div>
    </section>

    <!-- Jazz Detailed Pages -->
    <section class="">
        <div class="detail-pages">
            <?php
            include __DIR__ . '/../components/page.php';
            ?>

            <?php
            include __DIR__ . '/../components/page.php';
            ?>
        </div>
    </section>

    <!-- Jazz Map -->
    <section class="venues">
        <div class="venues-container">
            <div id="map">
            </div>
            <div class="venues-details">
                more details about the locations
            </div>
        </div>
    </section>
</div>
<?php
include __DIR__ . '/../footer.php';
?>

<script>
    function initMap() {
        var location = { lat: 52.387, lng: 4.646 };
        var location1 = { lat: 52.38303958402897, lng: 4.6286939897737645 };
        var location2 = { lat: 52.38146385371384, lng: 4.636038419230462 };

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
    }      
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87xRP5re_yw-jqZE9wjTViX80gXYntHw&callback=initMap">
    </script>