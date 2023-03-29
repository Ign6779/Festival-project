<? include __DIR__ . '/../adminheader.php' ?>
<a href="/user" class="btn btn-primary">Back</a>
<form method="POST" action="/user/addUser" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="registration">Registration</label>
            <input type="text" class="form-control" id="registration" name="registration" required>
        </div>
    </div>

    <!-- rest of the fields -->

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="adduser">Add</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>