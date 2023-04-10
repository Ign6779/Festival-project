<?php
require __DIR__ . '/../adminheader.php';
?>

<a href="/jazzevent" class="btn btn-primary">Back</a>
<form method="POST" action="/jazzevent/addJazzEvent" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="title">Event name</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    </div>

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
            <label for="venueId">Venue ID</label>
            <input type="number" class="form-control" id="venueId" name="venueId" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="addjazzevent">Add</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>