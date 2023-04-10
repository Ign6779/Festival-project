<?php
include __DIR__ . '/../header.php';
function returnVisible($message)
{
    $visble = "";
    if ($message != "") {
        $visble = "d-block";
    } else {
        $visble = "d-none";
    }
    return $visble;
}
?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="/img/login.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="/resetpassword/updatePassword?token=<? echo $_GET['token']; ?>" method="post">
                    <div>
                        <h1 class="reset-header">Reset your password</h1>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" name="passwordInput"
                            class="form-control form-control-lg" placeholder="Enter new password..." />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <!-- Repeat Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" name="passwordInput"
                            class="form-control form-control-lg" placeholder="Repeat new password..." />
                        <label class="form-label" for="form3Example4">Repeat password</label>
                    </div>
                    <!-- Button -->
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" value="Reset your password" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" name="resetpassword">
                    </div>

                    <div
                        class="row d-flex justify-content-center align-items-center mt-3 <? echo returnVisible($message); ?>">
                        <div class="col alert alert-danger d-flex justify-content-center align-items-center"
                            role="alert">
                            <? echo $message ?> <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include __DIR__ . '/../footer.php';
?>