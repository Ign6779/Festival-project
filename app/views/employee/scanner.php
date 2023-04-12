<link rel="stylesheet" href="/css/scanner.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">

    <div id="employee-ticket-display">
    <h1 id="scanner-h1"> <?echo $ticketOrder->getEvent()->getTitle(); ?> </h1>
    <p class="scanner-p"><?echo "Name: ".$ticketOrder->getUser()->getUsername(); ?></p>
    <p class="scanner-p"> <?echo "Date of event: ". $ticketOrder->getEvent()->getDate(); ?> </p>
    <p class="scanner-p"><? echo "Start hour: ".$ticketOrder->getEvent()->getStartTime(); ?> </p>
    <p class="scanner-p"><? echo "Type of ticket:".$ticketOrder->getEvent()->getType(); ?> </p>

    <?php if($ticketOrder->getIsScanned()): ?>
    <p class="scanner-p">This ticket has been scanned.</p>
    <?php else: ?>
    <p class="scanner-p">This ticket has not been scanned yet.</p>
    <?php endif; ?>

    <div ><a href="/employee" id="btn-finish-scanning" class="btn" onclick="">Finish Checking</a>
  
<style>

</style>

<script>
  const button = document.getElementById('btn-finish-scanning');
  const orderId = "<?php echo $ticketOrder->getId(); ?>";

  button.addEventListener('click', () => {
    fetch('http://localhost/api/scanner/changeScannedStatus?orderId=' + orderId)
    .then(response => {
      if (response.ok) {
        alert('Scanned status changed successfully');
      } else {
        alert('Error changing scanned status');
      }
    })
    .catch(error => console.error(error));
  });
</script>
