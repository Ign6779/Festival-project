<? include __DIR__ . '/../adminheader.php' ?>

<form method="POST" action="/venue/updateVenue?venueid=<? echo $venue->getId(); ?>" class="container ">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="venuename">Venue name</label>
            <input type="text" class="form-control" id="venuename" name="venuename"
                value="<? echo $venue->getName(); ?>" required>
        </div>

    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="venuelocation">Venue location</label>
            <input type="text" class="form-control" id="venuelocation" value="<? echo $venue->getLocation(); ?>"
                name="venuelocation" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updatevenue">Update</button>
    </div>
</form>


<script>

</script>