<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2 "><a href="/venue/addVenueForm" class="btn btn-primary">Add a venue</a>
    </div>
</div>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
        document.getElementsByTagName("tbody")[0].innerHTML = "";
        fetch('http://localhost/api/venue')
            .then(result => result.json())
            .then((data) => {
                console.log(data);
                data.forEach(load)
            }).catch(err => console.error(err));
    }

    function load(venueInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");
        tdId = document.createElement("td");
        tdId.innerHTML = venueInput.id;
        tdName = document.createElement("td");
        tdName.innerHTML = venueInput.name;
        tdLocation = document.createElement("td");
        tdLocation.innerHTML = venueInput.location;
        tdButtons = document.createElement("td");
        aEdit = document.createElement("a");
        aDelete = document.createElement("a");
        aEdit.className = "btn btn-warning me-2";
        aDelete.className = "btn btn-danger";
        aEdit.innerHTML = "Edit";
        aDelete.innerHTML = "Delete";
        aEdit.href = "/venue/editVenueForm?venueId=" + venueInput.id;
        aDelete.onclick = function () {
            deleteVunue(venueInput.id);
        };
        tdButtons.append(aEdit, aDelete);
        tr.append(tdId, tdName, tdLocation, tdButtons)
        tbody.appendChild(tr);
    }

    function deleteVunue(id) {
        fetch('http://localhost/api/venue/deleteVunue?venueid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
            })
            .catch(error => console.log(error));

        refresh();
    }
</script>