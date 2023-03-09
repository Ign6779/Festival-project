<?php
include __DIR__ . '/../header.php';
?>
<head>
  <link rel="stylesheet" href="/../css/yummy.css">
  <link rel="stylesheet" href="/../css/components.css">
</head>
<body>
  <div id="yummy-header">
    <h1 id="yummy-title">YUMMY! HAARLEM</h1>
    <button class="red-button" id="header-button">Buy tickets</button>
  </div>

  <div id="yummy-introduction">
    <p><b>What is a festival without food?</b> The restaurants here in Haarlem have decided to create special menus to celebrate the festival! Enjoy a fun family dining experience, or a romantic date with your partner with our prepared catering at the restaurants listed below. Each restaurant has a 1.5-2h tasting session prepared, where you may try classical Dutch or French high cuisine, Asian or even a mix of all!</p>
  </div>

  <section id="restaurant-info">
    <div id="restaurant-cards">
      these are the cards

      <?php
        foreach ($restaurants as $restaurant) {
          echo "<h1>{$restaurant->getName()}</h1>";
          echo "<p>Location: {$restaurant->getLocation()}</p>";
          echo "<p>Description: {$restaurant->getDescription()}</p>";
          echo "<p>Content: {$restaurant->getContent()}</p>";
          echo "<p>Halal: {$restaurant->getHalal()}</p>";
          echo "<p>Vegan: {$restaurant->getVegan()}</p>";
          echo "<p>Duration: {$restaurant->getDuration()}</p>";
          echo "<p>Stars: {$restaurant->getStars()}</p>";
    
          echo "<h2>Sessions</h2>";
          echo "<ul>";
    
          foreach ($restaurant->getSessions() as $session) {
            echo "<li>Session ID: {$session->getId()}</li>";
            echo "<li>Start Time: {$session->getStartTime()}</li>";
            echo "<li>End Time: {$session->getEndTime()}</li>";
            echo "<li>Seats: {$session->getSeats()}</li>";
            echo "<li>Price: {$session->getPrice()}</li>";
            echo "<li>Reduced Price: {$session->getReducedPrice()}</li>";
          }
    
          echo "</ul>";
        }
      ?>
    </div>

    <aside id="map-aside">
      this will be the map
    </aside>
  </section>
  
<?php
include __DIR__ . '/../footer.php';
?>