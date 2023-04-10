<?php
require __DIR__ . '/../adminheader.php'
?>

<a href="/jazzevent" class="btn btn-primary">Back</a>

<form method="POST" action="/jazzevent/updateJazzEvent?jazzEventId=<?php echo $jazzEvent->getId(); ?>" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="title">Event name</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $jazzEvent->getTitle(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $jazzEvent->getDate(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="starttime">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $jazzEvent->getStartTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="endtime">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $jazzEvent->getEndTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="seats">Seats</label>
            <input type="number" class="form-control" id="seats" name="seats" value="<?php echo $jazzEvent->getSeats(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $jazzEvent->getPrice(); ?>" step="0.01" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="venueId">Venue Id</label>
            <input type="number" class="form-control" id="venueId" name="venueId" value="<?php echo $jazzEvent->getVenueId(); ?>" step="1" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="eventId">Event Id</label>
            <input type="number" class="form-control" id="eventId" name="eventId" value="<?php echo $jazzEvent->getEventId(); ?>" step="1" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateJazzEvent">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>