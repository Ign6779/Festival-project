<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2"><a href="/danceevent/addDanceEventForm" class="btn btn-primary">Add a dance event
    </a>
    </div>
</div>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Start time</th>
            <th scope="col">End time</th>
            <th scope="col">Seats</th>
            <th scope="col">Price</th>
            <th scope="col">Venue ID</th>
            <th scope="col">Session</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
    document.getElementsByTagName("tbody")[0].innerHTML = "";
    fetch('http://localhost/api/danceevent')
    .then(result=>result.json())
    .then((data) => {
        console.log(data);
        Object.values(data).forEach(load);
    }).catch(err => console.error(err));
    }

    function load(danceInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = danceInput.id;

        tdTitle = document.createElement("td");
        tdTitle.innerHTML = danceInput.title;

        tdDate = document.createElement("td");
        tdDate.innerHTML = danceInput.date;

        tdStartTime = document.createElement("td");
        tdStartTime.innerHTML = danceInput.start_time;

        tdEndTime = document.createElement("td");
        tdEndTime.innerHTML = danceInput.end_time;

        tdSeats = document.createElement("td");
        tdSeats.innerHTML = danceInput.seats;

        tdPrice = document.createElement("td");
        tdPrice.innerHTML = danceInput.price;

        tdVenueId = document.createElement("td");
        tdVenueId.innerHTML = danceInput.venueId;

        tdSession = document.createElement("td");
        tdSession.innerHTML = danceInput.session;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rDelete = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rDelete.className = "btn btn-danger";
        rEdit.innerHTML = "Edit";
        rDelete.innerHTML = "Delete";
        rEdit.href = "/danceevent/editDanceEventForm?danceEventId=" + danceInput.id;
        rDelete.onclick = function() {
            deleteDance(danceInput.eventId);
        };
        tdButtons.append(rEdit, rDelete);
        tr.append(tdId, tdTitle, tdDate, tdStartTime, tdEndTime, tdSeats, tdPrice, tdVenueId, tdSession, tdButtons);
        tbody.appendChild(tr);

    }

    function deleteDance(id) {
        fetch ('http://localhost/api/danceevent/deleteDanceEvent?danceEventId=' + id, {
            method: 'GET'
        })
        .then(result => {
            console.log(result);
            window.location.href = 'http://localhost/danceevent';
        })
        .catch(error => console.log(error));

    }
</script>