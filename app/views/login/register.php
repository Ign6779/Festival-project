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
    <div class="row-md-12 d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="/img/login.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-3">
        <form id="registerform" method="post">

          <!-- Userame input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="usernameInput" class="form-control form-control-lg"
              placeholder="Enter your username" required />
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" name="emailInput" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="passInput" class="form-control form-control-lg"
              placeholder="Password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <!-- Repeat Password input -->
          <div class="form-outline mb-3">
            <input type="number" id="form3Example4" name="phoneNumber" class="form-control form-control-lg"
              placeholder="062345263" required/>
            <label class="form-label" for="form3Example4">Number</label>
          </div>

          <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="addressInput" class="form-control form-control-lg"
              placeholder="Address" required/>
            <label class="form-label" for="form3Example4">Address</label>
          </div>

          <div class="g-recaptcha" data-sitekey="6LeOjOgkAAAAAMCoe4KB9sd146Bkg3DEabH1cFVt"></div>

          <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
            <label class="form-check-label" for="form2Example3">
              I agree all statements in <a href="#!">Terms of service</a>
            </label>
          </div>

          <div class="row">
            <div class="col-sm-3 text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"
                value="Sign-up" id="register" name="register">
            </div>
          </div>

          <div class="row d-flex justify-content-center align-items-center mt-3 <? echo returnVisible($message); ?>">
            <div class="col alert alert-danger d-flex justify-content-center align-items-center" role="alert">
              <? echo $message ?> <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).on('click', '#register', function () {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      alert("Please verify you are not robot");
      return false;
    }
    else {
      document.getElementById('registerform').action;
      document.getElementById('registerform').action = "/login/signUp";
    }
  });
  function redirect(src) {
    window.location = src;
  }
</script>

<?php
include __DIR__ . '/../footer.php';

?>