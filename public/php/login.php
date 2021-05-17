<?php
$fieldErr = "";
  if(isset($_POST['submitLogin'])){
    $xml = simplexml_load_file("../../user_info.xml");//Loading XML file in an object
    $currEmail = $_POST['email'];
    $currPassword = $_POST['password'];
    foreach ($xml->userList->user as $user) {

      if($user->email == $currEmail && $user->password == $currPassword){
        setcookie("user_code", $user->code, time() + 86400, "/");
        setcookie("user_firstName", $user->firstName, time() + 86400, "/");
        setcookie("user_lastName", $user->lastName, time() + 86400, "/");
        setcookie("user_email", $user->email, time() + 86400, "/");
        setcookie("user_password", $user->password, time() + 86400, "/");
        setcookie("user_address", $user->address, time() + 86400, "/");
        setcookie("user_city", $user->city, time() + 86400, "/");
        setcookie("user_stateOrProvince", $user->stateOrProvince, time() + 86400, "/");
        setcookie("user_postalCode", $user->postalCode, time() + 86400, "/");
        header("Location: ../../index.php");
      }
    }
    $fieldErr = "Invalid Email or Password";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Login </title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/backstore.css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/master.css">
</head>

<body>
  <script type="text/javascript">

  </script>
  <!-- Navbar -->
  <?php include('header.php'); ?>

    <section class="page-name">
        <div>
           Login
        </div>
    </section>

    <div class="flex-wrapper">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
          <div class="card text-center">
                  <div class="card-header bg-dark text-white">
                      <h1>User Sign In</h1></div>
                        <img src="../../images/mcJawz_logo_no_txt.png" class="img-fluid align-self-center" alt="shark">

          <div class="card-body my-auto ">
            <form method = "POST">
                <input class="inputField" type="text" placeholder="Email" name="email">
                <input class="inputField " type="password" placeholder="Password" name = "password"><br>
                <p style="color:red;"><?php echo $fieldErr?></p>
                <div class="formButtons">
                    <input type="submit" name = "submitLogin" value = "Log in" class="btn btn-primary mt-3 mb-3">
                    <button type="button" class="btn btn-danger mt-3 mb-3">Forgot Password</button>
                </div>
            </form></div>
            <div class="card-footer bg-dark">
                <h6>No account ? <a class="clickhere" href="../html/signup.html"> Click here to make one.</h6></a>
              </div>
          </div>
        </div>
      </div>




      <!-- Footer -->
      <?php include('footer.php'); ?>


</body>
</html>
