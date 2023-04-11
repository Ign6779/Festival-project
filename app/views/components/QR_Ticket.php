<?
    $card_event_name = "Name of event";
    $card_customer_name = "Name of customer";
    $card_event_date = "Date of event";
    $card_event_time = "Time of event";
    $is_scanned = "Is the code scanned";

?>

<div class="card w-50" id="qr-ticket">
<div class= qr-card-body>
    <h1><?php echo $card_event_name; ?></h1>
    <h2><?php echo $card_customer_name; ?></h2>
    <p><?php echo $card_event_date; ?></p>
    <p><?php echo $card_event_time; ?></p>
    <p><?php echo $is_scanned; ?></p>

</div>

</div>