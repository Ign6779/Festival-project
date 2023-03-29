<? include __DIR__ . '/../adminheader.php' ?>

<form method="POST" action="/user/updateUser?userid=<? echo $user->getId(); ?>" class="container "
    enctype="multipart/form-data">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<? echo $user->getUsername(); ?>" required>
        </div>
    </div>

    <!-- rest of the fields -->

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateartist">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>