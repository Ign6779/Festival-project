<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2 "><a href="/tour/addTourForm" class="btn btn-primary">Add a tour
    </a>
    </div>
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
            <th scope="col">Language</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
    document.getElementsByTagName("tbody")[0].innerHTML = "";
    fetch('http://localhost/api/tour')
    .then(result=>result.json())
    .then((data) => {
        console.log(data);
        Object.values(data).forEach(load);
    }).catch(err => console.error(err));
    }

    function load(tourInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = tourInput.id;

        tdDate = document.createElement("td");
        tdDate.innerHTML = tourInput.date;

        tdStartTime = document.createElement("td");
        tdStartTime.innerHTML = tourInput.start_time;

        tdEndTime = document.createElement("td");
        tdEndTime.innerHTML = tourInput.end_time;

        tdSeats = document.createElement("td");
        tdSeats.innerHTML = tourInput.seats;

        tdPrice = document.createElement("td");
        tdPrice.innerHTML = tourInput.price;

        tdLanguage = document.createElement("td");
        tdLanguage.innerHTML = tourInput.language;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rDelete = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rDelete.className = "btn btn-danger";
        rEdit.innerHTML = "Edit";
        rDelete.innerHTML = "Delete";
        rEdit.href = "/tour/editTourForm?tourId=" + tourInput.id;
        rDelete.onclick = function() {
            deleteTour(tourInput.event_id);
        };
        tdButtons.append(rEdit, rDelete);
        tr.append(tdId, tdDate, tdStartTime, tdEndTime, tdSeats, tdPrice, tdLanguage, tdButtons);
        tbody.appendChild(tr);

    }

    function deleteTour(id) {
        fetch ('http://localhost/api/tour/deleteTour?tourId=' + id, {
            method: 'GET'
        })
        .then(result => {
            console.log(result);
            window.location.href = 'http://localhost/tour';
        })
        .catch(error => console.log(error));

    }

</script>