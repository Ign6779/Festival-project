this is the test page.
<div>
    <?php
    foreach ($tours as $tour) {
        ?>
        
        <h1><?php echo $tour->getId() ?></h1>
        <h2><?php echo $tour->getDate() ?></h2>
        <h2><?php echo $tour->getTime() ?></h2>
        <p><?php echo $tour->getAvaliableSeatsEn() ?></p>
        <p><?php echo $tour->getAvailableSeatsNl() ?></p>
        <p><?php echo $tour->getAvailableSeatsCh() ?></p>

        <?php
    }
    ?>
</div>