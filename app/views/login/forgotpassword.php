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
                <form action="/login/sendEmailToRest" method="POST">
                    <div>
                        <h1>Reset your password</h1>
                        <p class="text-reset-password">An e-mail will be send to you with instructions on how to reset
                            your password.</p>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example4" name="emailInput" class="form-control form-control-lg"
                            placeholder="Enter your e-mail address..." />
                    </div>
                    <!-- Button -->
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" value="Receive new password by e-mail" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" name="sendRestEmail">
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

<script type="text/javascript">
    function redirect() {
        window.location = '/';
    }
</script>

<?php
include __DIR__ . '/../footer.php';
?>