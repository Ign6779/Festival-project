<?php
require __DIR__ . '/../adminheader.php'
?>
<a href="/danceevent" class="btn btn-primary">Back</a>

<form method="POST" action="/danceevent/updateDanceEvent?danceEventId=<?php echo $danceEvent->getId(); ?>" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $danceEvent->getDate(); ?>" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="starttime">Start Time</label>
        <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $danceEvent->getStartTime(); ?>" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="endtime">End Time</label>
        <input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $danceEvent->getEndTime(); ?>" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="seats">Seats</label>
        <input type="number" class="form-control" id="seats" name="seats" value="<?php echo $danceEvent->getSeats(); ?>" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $danceEvent->getPrice(); ?>" step="0.01" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="venueId">Venue Id</label>
        <input type="number" class="form-control" id="venueId" name="venueId" value="<?php echo $danceEvent->getVenueId(); ?>" step="1" required>
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-5">
        <label for="eventId">Event Id</label>
        <input type="number" class="form-control" id="eventId" name="eventId" value="<?php echo $danceEvent->getEventId(); ?>" step="1" required>
    </div>
</div>

<div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="session">Session</label>
            <select class="form-control" id="session" name="session" required>
                <option value="Back2Back" <?php if ($danceEvent->getSession() == 'Back2Back') echo 'selected'; ?>>Back2Back</option>
                <option value="Club" <?php if ($danceEvent->getSession() == 'Club') echo 'selected'; ?>>Club</option>
                <option value="TiestoWorld" <?php if ($danceEvent->getSession() == 'TiestoWorld') echo 'selected'; ?>>TiestoWorld</option>
            </select>
        </div>
    </div>

<div class="row justify-content-center">
    <button type="submit" class="btn btn-primary col-5" name="updateDanceEvent">Update</button>
</div>

<div class="row justify-content-center">
    <p id="errormessage" class="col-5
