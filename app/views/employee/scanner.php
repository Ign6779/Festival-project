<link rel="stylesheet" href="/css/scanner.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">

    <div id="employee-ticket-display">
    <h1> <?echo $ticketOrder->getEvent()->getTitle(); ?> </h1>
    <h1><?echo $ticketOrder->getUser()->getUsername(); ?></h1>
    <h2> <?echo "Date of event: ". $ticketOrder->getEvent()->getDate(); ?> </h2>
    <h2><? echo "Start hour: ".$ticketOrder->getEvent()->getStartTime(); ?> </h2>
    <?php if($ticketOrder->getIsScanned()): ?>
    <p>This ticket has been scanned.</p>
    <?php else: ?>
    <p>This ticket has not been scanned yet.</p>
    <?php endif; ?>

    <div ><a href="/login/login" id="btn-finish-scanning" onclick="updateScannedtatus($ticketOrder->getUid())">Finish Checking</a>
  
<style>
#employee-ticket-display{
    width: 450px;
    text-align: center;
    padding-left: 80px;
    margin-top: 50px;
}

#btn-finish-scanning{
    margin-top: 200px;
    margin-left: 150px; 
    width:300px;
    height:50px;
    background-color: #92140C;
  border-radius: 25px;
  border: none;
  color: white;
  padding: 15px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  box-shadow: 5px 10px #888888;
  font-weight: bold;
}

</style>

<script>

    function updateScannedStatus(id){
        fetch('http://localhost/api/changeScannedStatus?orderid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
            })
            .catch(error => console.log(error));

    }


</script>