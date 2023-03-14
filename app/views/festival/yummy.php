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
      <?php
        foreach ($restaurants as $restaurant) {
          ?>
          <div class="restaurant-card">
            <div class="card-image">
              <img src="/../img/<?= $restaurant->getImage() ?>" alt="<?php $restaurant->getName() ?>">
            </div>

            <div class="card-content">
              <div class="card-title-row">
                <h2 class="card-title"><?= $restaurant->getName() ?></h2>
                <div class="star-rating">
                  <?php 
                    for ($i = 0; $i < $restaurant->getStars(); $i++) {
                      ?>
                        S
                      <?php
                    }
                  ?>
                </div>
              </div>

              <p class="card-description"><?= $restaurant->getDescription() ?></p>

              <div class="card-info-row">
                <div class="card-info-item">Duration: <?= $restaurant->getDuration() ?></div>
                <div class="card-info-item">Halal: <?= $restaurant->getHalal() ?></div>
                <div class="card-info-item">Vegan: <?= $restaurant->getVegan() ?></div>
              </div>

            </div>
          </div>
          <?php
        }
      ?>
    </div>

    <aside id="restaurant-aside">
      this will be the map
    </aside>
  </section>
  
  <script>
    const restaurantAsideDiv = document.getElementById("map")
  </script>
<?php
include __DIR__ . '/../footer.php';
?>