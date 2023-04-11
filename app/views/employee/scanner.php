<link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">


    <h1> <?echo $ticketOrder->getEvent()->getTitle(); ?> </h1>
    <h1><?echo $ticketOrder->getUser()->getUsername(); ?></h1>
    <h2> <?echo "Date of event: ". $ticketOrder->getEvent()->getDate(); ?> </h2>
    <h2><? echo "Start hour: ".$ticketOrder->getEvent()->getStartTime(); ?> </h2>

     <p id="is_scanned_status"> </p>
    
     <a href="/homepage" class="btn-red" onclick="updateScannedtatus">Finish Checking</a>
    

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

    function isScannedStatus(){
        var is_scanned = document.getElementById("is_scanned_status");
        if($ticketOrder->getIsScanned() == 0)
        {
            is_scanned.innerHTML = "Ticket has not been scanned";
        }
        else 
        {
            is_scanned.innerHTML =  "Ticket has been scanned!";
        } 
    }
</script>