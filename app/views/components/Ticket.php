<?php
    $card_title = "TICKET";
    $card_text = "information over here";
    $button_link = "link to payment page/card";
    $button_text = "Add to cart";
    $price = "price here";
?>

<div class="card w-50" id="ticket-comp">
  <img src="<?php echo $image_url; ?>" class="card-img-left" alt="ticket image" id="ticket_img">
  <div class="ticket-card-body">
    <h1 class="card-title"><?php echo $card_title; ?></h1>
    <p class="card-text"><?php echo $card_text; ?></p>
    <div class="number-selector">number of people selector</div>
    <p class="price"><?php echo $price; ?></p>
    <a href="<?php echo $button_link; ?>" class="btn btn-primary" id="ticket-btn"><?php echo $button_text; ?></a>
  </div>
</div>