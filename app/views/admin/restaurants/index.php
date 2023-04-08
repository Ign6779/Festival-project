<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2 "><a href="/restaurant/addRestaurantForm" class="btn btn-primary">Add a restaurant
    </a>
    </div>
</div>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Description</th>
            <th scope="col">Content</th>
            <th scope="col">Halal</th>
            <th scope="col">Vegan</th>
            <th scope="col">Stars</th>
            <th scope="col">Duration</th>
            <th scope="col">Image</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
    document.getElementsByTagName("tbody")[0].innerHTML = "";
    fetch('http://localhost/api/restaurant')
    .then(result=>result.json())
    .then((data) => {
        console.log(data);
        Object.values(data).forEach(load);
    }).catch(err => console.error(err));
    }

    function load(restaurantInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = restaurantInput.id;

        tdName = document.createElement("td");
        tdName.innerHTML = restaurantInput.name;

        tdLocation = document.createElement("td");
        tdLocation.innerHTML = restaurantInput.location;

        tdDescription = document.createElement("td");
        tdDescription.innerHTML = restaurantInput.description;

        tdContent = document.createElement("td");
        tdContent.innerHTML = restaurantInput.content;

        tdHalal = document.createElement("td");
        tdHalal.innerHTML = restaurantInput.halal;

        tdVegan = document.createElement("td");
        tdVegan.innerHTML = restaurantInput.vegan;

        tdStars = document.createElement("td");
        tdStars.innerHTML = restaurantInput.stars;

        tdDuration = document.createElement("td");
        tdDuration.innerHTML = restaurantInput.duration;

        tdImage = document.createElement("td");
        tdImage.innerHTML = restaurantInput.image;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rDelete = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rDelete.className = "btn btn-danger";
        rEdit.innerHTML = "Edit";
        rDelete.innerHTML = "Delete";
        rEdit.href = "/restaurant/editRestaurantForm?restaurantId=" + restaurantInput.id;
        rDelete.onclick = function() {
            deleteRestaurant(restaurantInput.id);
        };
        tdButtons.append(rEdit, rDelete);
        tr.append(tdId, tdName, tdLocation, tdDescription, tdContent, tdHalal, tdVegan, tdStars, tdDuration, tdImage, tdButtons);
        tbody.appendChild(tr);

    }

    function deleteRestaurant(id) {
        fetch ('http://localhost/api/restaurant/deleteRestaurant?restaurantId=' + id, {
            method: 'GET'
        })
        .then(result => {
            console.log(result)
        })
        .catch(error => console.log(error));

        refresh();
    }

</script>