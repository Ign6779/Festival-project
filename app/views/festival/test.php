this is the test page.
<?php
$newRestaurant = new Restaurant();
$newRestaurant->setName('Sample Restaurant');
$newRestaurant->setLocation('123 Sample Street, Sample City');
$newRestaurant->setDescription('A sample restaurant description');
$newRestaurant->setContent('A sample restaurant content');
$newRestaurant->setHalal(true);
$newRestaurant->setVegan(false);
$newRestaurant->setStars(4);
$newRestaurant->setDuration(2);
$newRestaurant->setImage('sample_restaurant.jpg');
$this->restaurantService->AddRestaurant($newRestaurant);


?>