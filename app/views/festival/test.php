this is the test page.
<div>
    <?php
        foreach ($restaurants as $restaurant) {
            echo "<h1>{$restaurant->getName()}</h1>";
            echo "<p>Description: {$restaurant->getDescription()}</p>";
            echo "<p>Content: {$restaurant->getContent()}</p>";
            echo "<p>Halal: {$restaurant->getHalal()}</p>";
            echo "<p>Vegan: {$restaurant->getVegan()}</p>";
            echo "<p>Stars: {$restaurant->getStars()}</p>";
            echo "<p>Image: {$restaurant->getImage()}</p>";

            echo "<h2>Sessions</h2>";
            echo "<ul>";

            foreach ($restaurant->getSessions() as $session) {
                echo "<li>Session ID: {$session->getId()}</li>";
                echo "<li>Date: {$session->getDate()}</li>";
                echo "<li>Start Time: {$session->getStartTime()}</li>";
                echo "<li>Duration: {$session->getDuration()}</li>";
                echo "<li>Seats: {$session->getSeats()}</li>";
                echo "<li>Price: {$session->getPrice()}</li>";
                echo "<li>Reduced Price: {$session->getReducedPrice()}</li>";
            }

            echo "</ul>";
        }
    ?>
</div>