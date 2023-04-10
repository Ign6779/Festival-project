<?php
require __DIR__ . '/../adminheader.php'
?>

<a href="/tour" class="btn btn-primary">Back</a>
<form method="POST" action="/tour/updateTour?tourId=<?php echo $tour->getId(); ?>" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $tour->getDate(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="starttime">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $tour->getStartTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="endtime">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $tour->getEndTime(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="seats">Seats</label>
            <input type="number" class="form-control" id="seats" name="seats" value="<?php echo $tour->getSeats(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $tour->getPrice(); ?>" step="0.01" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="language">Language</label>
            <select class="form-control" id="language" name="language" required>
                <option value="dutch" <?php if ($tour->getLanguage() == "dutch") echo "selected"; ?>>Dutch</option>
                <option value="english" <?php if ($tour->getLanguage() == "english") echo "selected"; ?>>English</option>
                <option value="chinese" <?php if ($tour->getLanguage() == "chinese") echo "selected"; ?>>Chinese</option>
            </select>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="eventId">Event Id</label>
            <input type="number" class="form-control" id="eventId" name="eventId" value="<?php echo $tour->getEventId(); ?>" step="1" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateTour">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>