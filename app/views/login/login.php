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
        <form action="/login/login" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example4" name="emailOrUsernameInput" class="form-control form-control-lg"
              placeholder="Enter a valid email address or username" required />
            <label class="form-label" for="form3Example3">Email address or username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="passwordInput" class="form-control form-control-lg"
              placeholder="Enter password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                class="link-danger">Register</a></p>
            <a href="/forgotpassword" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"
              name="login" value="Login">
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
  function redirect() {
    window.location = '/';
  }
</script>

<?php
include __DIR__ . '/../footer.php';
?>