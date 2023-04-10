<?php
require __DIR__ . '/../adminheader.php'
?>

<a href="/session" class="btn btn-primary">Back</a>
<form method="POST" action="/session/updateSession?sessionId=<?php echo $session->getId(); ?>" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $session->getDate(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="starttime">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $session->getStartTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="endtime">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $session->getEndTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="seats">Seats</label>
            <input type="number" class="form-control" id="seats" name="seats" value="<?php echo $session->getSeats(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $session->getPrice(); ?>" step="0.01" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="eventId">Event Id</label>
            <input type="number" class="form-control" id="eventId" name="eventId" value="<?php echo $session->getEventId(); ?>" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateSession">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>