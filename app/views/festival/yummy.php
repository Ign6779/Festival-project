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
    <a href="/ticket" class="btn-red" id="header-button">Buy tickets</a> 
  </div>
  <div id="yummy-introduction">
    <p><b>What is a festival without food?</b> The restaurants here in Haarlem have decided to create special menus to celebrate the festival! Enjoy a fun family dining experience, or a romantic date with your partner with our prepared catering at the restaurants listed below. Each restaurant has a 1.5-2h tasting session prepared, where you may try classical Dutch or French high cuisine, Asian or even a mix of all!</p>
  </div>

  <section id="restaurant-info">
    <div id="restaurant-cards">
      <?php
        foreach ($restaurants as $restaurant) {
          ?>
          <div class="restaurant-card"  data-id=<?= $restaurant->getId() ?>>
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
      
    </aside>
  </section>

  <!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a class="arrow-up" href="#top">&#8593</a>
</div>

  <script>
    //saving aside content
    const restaurantInfoDiv = document.getElementById('restaurant-aside');
    const originalAsideContent = restaurantInfoDiv.innerHTML;


    //restaurant card things
    function getRestaurantInfo(id) { //api!
    fetch ('http://localhost/api/yummy/getOne?id=' + id, {
      method: 'GET'
      })
      .then(result => {
          return result.json();
      })
      .then(restaurant => {
          console.log(restaurant); //just double checking
          const restaurantInfoDiv = document.getElementById('restaurant-aside');
          restaurantInfoDiv.innerHTML = `
            <h2>${restaurant.name}</h2>
            <img src="/../img/${restaurant.image}">
            <p>${restaurant.content}</p>

            <form class="restaurant-form">
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date">
              </div>
              <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time">
              </div>
              <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <input type="text"class="form-control" id="time">
              </div>
              <div class="mb-3">
                <input type="submit"class="btn btn-primary" id="time">
              </div>

            </form>
          `;

          // display the restaurant info div
          restaurantInfoDiv.classList.add('active');
          restaurantInfoDiv.style.display = 'block';
      })
      .catch(error => console.log(error));
    }

    const cards = document.getElementsByClassName("restaurant-card");
    Array.from(cards).forEach(card => {
      const restaurantId = card.dataset.id;
      card.addEventListener('click', () => {getRestaurantInfo(restaurantId)});
    });


    //restaurant-aside things
    document.addEventListener('click', (event) => {
    if (event.target.closest('.restaurant-card') || event.target.closest('#restaurant-aside')) {
      return;
    } else {
      const restaurantInfoDiv = document.getElementById('restaurant-aside');
      restaurantInfoDiv.innerHTML = originalAsideContent;
      restaurantInfoDiv.classList.remove('active');
      //restaurantInfoDiv.style.display = 'none';
    }
    });
  </script>
<?php
include __DIR__ . '/../footer.php';
?>
