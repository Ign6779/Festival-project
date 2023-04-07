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
    }

</script>