<div class="col-md-1 "><a href="/homepage" class="btn btn-primary">Finish Checking</a>
    </div>


<script>

    function load(){

        orderTicketInput = getScannerInformation($id);
        var eventName = document.createElement("h1");
        eventName.innerHTML = orderTicketInput.eventName;
        var username = document.createElement("h2");
        username.innerHTML = orderTicketInput.username;
        var date = document.createElement("p");
        date.innerHTML = orderTicketInput.date;
        var startTime = document.createElement("p");
        startTime.innerHTML = orderTicketInput.startTime;
        var is_scanned = document.createElement("p");
        is_scanned.innerHTML = isScannedStatus(orderTicketInput.is_scanned);

        h1.appendChild(eventName);
        h2.appendChild(username);
        p.appendChild(date, startTime, is_scanned);
    }

    function updateScannedStatus(id){
        fetch('http://localhost/api/changeScannedStatus?orderid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
            })
            .catch(error => console.log(error));

    }

    function isScannedStatus(is_scanned){
        if(is_scanned == 0)
        return "Ticket has not been scanned!";
        else return "Ticket has been scanned!";
    }
</script>