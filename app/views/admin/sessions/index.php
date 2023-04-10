<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2 "><a href="/session/addSessionForm" class="btn btn-primary">Add a session</a></div>
</div>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Date</th>
            <th scope="col">Start time</th>
            <th scope="col">End time</th>
            <th scope="col">Seats</th>
            <th scope="col">Price</th>
            <th scope="col">Restaurant Id</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
        document.getElementsByTagName("tbody")[0].innerHTML = "";
        fetch('http://localhost/api/session')
            .then(result => result.json())
            .then((data) => {
                console.log(data);
                Object.values(data).forEach(load);
            }).catch(err => console.error(err));
    }

    function load(sessionInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = sessionInput.id;

        tdDate = document.createElement("td");
        tdDate.innerHTML = sessionInput.date;

        tdStartTime = document.createElement("td");
        tdStartTime.innerHTML = sessionInput.start_time;

        tdEndTime = document.createElement("td");
        tdEndTime.innerHTML = sessionInput.end_time;

        tdSeats = document.createElement("td");
        tdSeats.innerHTML = sessionInput.seats;

        tdPrice = document.createElement("td");
        tdPrice.innerHTML = sessionInput.price;

        tdRestaurant = document.createElement("td");
        tdRestaurant.innerHTML = sessionInput.restaurantId;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rDelete = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rDelete.className = "btn btn-danger";
        rEdit.innerHTML = "Edit";
        rDelete.innerHTML = "Delete";
        rEdit.href = "/session/editSessionForm?sessionId=" + sessionInput.id;
        rDelete.onclick = function () {
            deleteSession(sessionInput.id);
        };
        tdButtons.append(rEdit, rDelete);
        tr.append(tdId, tdDate, tdStartTime, tdEndTime, tdSeats, tdPrice, tdRestaurant, tdButtons);
        tbody.appendChild(tr);
    }

    function deleteSession(id) {
        fetch('http://localhost/api/session/deleteSession?sessionId=' + id, {
                method: 'GET'
            })
            .then(result => {
                console.log(result);
                window.location.href = 'http://localhost/session';
            })
            .catch(error => console.log(error));
    }
</script>
