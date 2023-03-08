<?php
include __DIR__ . '/../header.php';
?>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="/img/login.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="/login/login" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

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
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Log-in" name="login">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/login/register"
                class="link-danger">Register</a></p>
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

// $userService = new UserService();

// //Chedck email/username and password for Login
// if ($_SERVER["REQUEST_METHOD"] == "POST")
// {
//   $username = "";
//   if ( isset($_POST['emailInput']))
//   {
//     $username = $_POST['emailInput']; 
//   }

//   $user = $userService -> getByUsername($username);

//   if($user != null)
//   {
//     if (isset($_POST['passwordInput']))
//     {
//       if ($_POST['passwordInput'] == $user -> getPassword())
//       {
//         echo '<script type="text/javascript">redirect();</script>';
//       }
//     }
//   } else {
//     //display message for wrong email or password
//   } 
//}


// class Password{
//   public function encryptPassword($password){
//   $hash = password_hash($password, 
//           PASSWORD_DEFAULT);
//   return $hash;
//   }

//   public function decryptPassword($hash){
//   $password = "Password@123"; // here should be the password that user insert
//   $verify = password_verify($password, $hash);
//   return $verify;
//   }
// }
?>


