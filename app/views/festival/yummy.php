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
          ?>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/../img/<?= $restaurant->getImage() ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $restaurant->getName() ?></h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <?php
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