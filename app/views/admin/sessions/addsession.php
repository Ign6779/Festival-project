<?php
require __DIR__ . '/../adminheader.php';
?>

<a href="/session" class="btn btn-primary">Back</a>
<form method="POST" action="/session/addSession" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="starttime">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="endtime">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="seats">Seats</label>
            <input type="number" class="form-control" id="seats" name="seats" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="restaurant">Restaurant Id</label>
            <input type="number" class="form-control" id="restaurantId" name="restaurantId" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="addsession">Add</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>
