<? include __DIR__ . '/../adminheader.php' ?>
<a href="/user" class="btn btn-primary">Back</a>
<form method="POST" action="/user/updateUser?userid=<? echo $user->getId(); ?>" class="container "
    enctype="multipart/form-data">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<? echo $user->getUsername(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<? echo $user->getUsername(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="role">Email</label>
            <input type="text" class="form-control" id="email" name="email" 
                value="<? echo $user->getEmail(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" 
                value="<? echo $user->getAddress(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" 
                value="<? echo $user->getAddress(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password"
                value="<? echo $user->getPassword(); ?>" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateartist">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>

