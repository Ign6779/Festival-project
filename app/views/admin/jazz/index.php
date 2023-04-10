<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2"><a href="/jazzevent/addJazzEventForm" class="btn btn-primary">Add a jazz event
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
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
    document.getElementsByTagName("tbody")[0].innerHTML = "";
    fetch('http://localhost/api/jazzevent')
    .then(result=>result.json())
    .then((data) => {
        console.log(data);
        Object.values(data).forEach(load);
    }).catch(err => console.error(err));
    }

    function load(jazzInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = jazzInput.id;

        tdTitle = document.createElement("td");
        tdTitle.innerHTML = jazzInput.title;

        tdDate = document.createElement("td");
        tdDate.innerHTML = jazzInput.date;

        tdStartTime = document.createElement("td");
        tdStartTime.innerHTML = jazzInput.start_time;

        tdEndTime = document.createElement("td");
        tdEndTime.innerHTML = jazzInput.end_time;

        tdSeats = document.createElement("td");
        tdSeats.innerHTML = jazzInput.seats;

        tdPrice = document.createElement("td");
        tdPrice.innerHTML = jazzInput.price;

        tdVenueId = document.createElement("td");
        tdVenueId.innerHTML = jazzInput.venueId;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rDelete = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rDelete.className = "btn btn-danger";
        rEdit.innerHTML = "Edit";
        rDelete.innerHTML = "Delete";
        rEdit.href = "/jazzevent/editJazzEventForm?jazzEventId=" + jazzInput.id;
        rDelete.onclick = function() {
            deleteJazz(jazzInput.eventId);
        };
        tdButtons.append(rEdit, rDelete);
        tr.append(tdId, tdTitle, tdDate, tdStartTime, tdEndTime, tdSeats, tdPrice, tdVenueId, tdButtons);
        tbody.appendChild(tr);

    }

    function deleteJazz(id) {
        fetch ('http://localhost/api/jazzevent/deleteJazzEvent?jazzEventId=' + id, {
            method: 'GET'
        })
        .then(result => {
            console.log(result);
            window.location.href = 'http://localhost/jazzevent';
        })
        .catch(error => console.log(error));

    }

</script>