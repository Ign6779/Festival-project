<?php
require __DIR__ . '/../adminheader.php';
?>

<a href="/restaurant" class="btn btn-primary">Back</a>
<form method="POST" action="/restaurant/addRestaurant" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="restaurantname">Restaurant Name</label>
            <input type="text" class="form-control" id="restaurantname" name="restaurantname" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="content">Content</label>
            <input type="text" class="form-control" id="content" name="content" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="halal">Halal</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="halal" name="halal" value="1">
                <label class="form-check-label" for="halal">
                    Yes
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="vegan">Vegan</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="1">
                <label class="form-check-label" for="vegan">
                    Yes
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="stars">Stars</label>
            <input type="text" class="form-control" id="stars" name="stars" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="addrestaurant">Add</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>