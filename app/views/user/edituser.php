<? include __DIR__ . '/../header.php' ?>

<a href="/" id="btn-back" class="btn btn-danger">Back</a>

<form method="POST" action="/user/edituser" class="container " enctype="multipart/form-data">

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?php echo $user->getUsername(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="useremail">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user->getEmail(); ?>"
                required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="password">Password</label><br>
            <button type="button" class="btn btn-default" onclick="createPasswordFields()" id="PasswordButton">Change
                Password</button><br>
            <div class="editpassword"></div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="userImage">Profile picture</label>
            <input type="file" name="imageup" accept=".jpg, .jpeg, .png" />
            <p>Please chose a picture for your profile.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="edituser">Edit Profile</button>
    </div>
</form>

<script>
    function createPasswordFields() {

        var editPasswordDiv = document.getElementsByClassName("editpassword")[0];

        // Create the first input field
        var oldpassword = document.createElement("input");
        oldpassword.type = "text";
        oldpassword.placeholder = "Enter new password";
        oldpassword.style.marginTop = "10px";
        oldpassword.setAttribute("name", "newpassword");

        // Create the second input field
        var repetpassword = document.createElement("input");
        repetpassword.type = "text";
        repetpassword.placeholder = "Repet new password";
        repetpassword.style.marginTop = "10px";
        repetpassword.setAttribute("name", "repetpassword");

        // Add CSS to display the input elements vertically
        oldpassword.style.display = "block";
        repetpassword.style.display = "block";

        // Append the input fields to the editPasswordDiv
        editPasswordDiv.appendChild(oldpassword);
        editPasswordDiv.appendChild(repetpassword);

        // Disable the button
        document.getElementById("PasswordButton").disabled = true;
    }
</script>