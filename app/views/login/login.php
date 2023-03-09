<?php
include __DIR__ . '/../header.php';
?>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="/img/login.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <!-- action="/login/login" -->
        <form id="loginform" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" name="emailInput" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" name="passwordInput" class="form-control form-control-lg"
                placeholder="Enter password" />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/login/register"
                  class="link-danger">Register</a></p>
              <a href="/login/forgotpassword" class="text-body">Forgot password?</a>
            </div>

            <div class="g-recaptcha" data-sitekey="6LeOjOgkAAAAAMCoe4KB9sd146Bkg3DEabH1cFVt"></div>

            <div class="text-center text-lg-start mt-4 pt-2">
             
                <input type="submit" class="btn btn-primary btn-lg" id="login" name="login"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/login/register"
                    class="link-danger">Register</a></p>
            </div>

        </form>
      </div>
    </div>
  </div>
</section>


  <script>
    $(document).on('click', '#login', function () {
      var response = grecaptcha.getResponse();
      if (response.length == 0) {
        alert("Please verify you are not robot");
        return false;
      }
      else {
        document.getElementById('loginform').action;
        document.getElementById('loginform').action = "/login/login";
      }
    });

    function redirect() {
      window.location = '/';
    }
  </script>

  <?php
  include __DIR__ . '/../footer.php';
  ?>