<?php
session_start(); //Starting the session
$firstNameErr = "*";
$lastNameErr = "*";
$emailErr = "*";
$passwordErr = "*";
$confirmPasswordErr = "*";
$isValid = true;
if(isset($_POST['submit'])){//The user pushed the submit button
  if(empty($_POST['firstName']) || !preg_match("/^[a-zA-Z0-9]{1,}$/", $_POST['firstName'])){
    $firstNameErr = "* Field Missing";
    $isValid = false;
  }
  if(empty($_POST['lastName']) || !preg_match("/^[a-zA-Z0-9]{1,}$/", $_POST['lastName'])){
    $lastNameErr = "* Field Missing";
    $isValid = false;
  }
  if(empty($_POST['email'])){
    $emailErr = "* Field Missing";
    $isValid = false;
  }elseif(!preg_match("/^[a-zA-Z0-9]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{1,}$/", $_POST['email'])){
    $emailErr = "* Email is Invalid";
    $isValid = false;
  }
  if(empty($_POST['password'])){
    $passwordErr = "* Field Missing";
    $isValid = false;
  }elseif (!preg_match("/^[a-zA-Z0-9]{8,12}$/", $_POST['password'])) {
    $passwordErr = "* Password is Invalid ";
    $isValid = false;
  }elseif ($_POST['password']!=$_POST['confirmPassword']) {
    $confirmPasswordErr = "* Passwords don't match";
    $isValid = false;
  }

if($isValid==true){

  $xml = simplexml_load_file("../../user_info.xml");//Loading XML file in an object

  $currentAmount = $xml->amount;
  $lastCode = $xml->userList->user[(intval($currentAmount)-1)]->code;
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(empty($_POST['address'])){
    $address = " ";
  }else{
    $address = $_POST['address'];
  }
  if(empty($_POST['city'])){
    $city = " ";
  }else{
  $city = $_POST['city'];
}
  if(empty($_POST['stateOrProvince'])){
    $stateOrProvince = " ";
  }else{
    $stateOrProvince = $_POST['stateOrProvince'];
  }
  if(empty($_POST['postalCode'])){
    $postalCode = " ";
  }else{
    $postalCode =  $_POST['postalCode'];
  }


  $newUser = $xml->userList->addChild("user");
  $newUser->addChild("code", $lastCode +1);
  $newUser->addChild("firstName", $firstName);
  $newUser->addChild("lastName", $lastName);
  $newUser->addChild("email", $email);
  $newUser->addChild("password", $password);
  $newUser->addChild("address", $address);
  $newUser->addChild("city", $city);
  $newUser->addChild("stateOrProvince", $stateOrProvince);
  $newUser->addChild("postalCode", $postalCode);

  $xml->amount = intval($currentAmount)+1;//Increasing the amount value in XML
  $xml->asXML("../../user_info.xml");//Saving to XML file

  //Storing User infos on php session
//  $_SESSION['user_code'] = $currentAmount;
//  $_SESSION['user_firstName'] = $firstName;
//  $_SESSION['user_email'] = $email;
  //$_SESSION['user_password'] = $password;
//  $_SESSION['user_address'] = $address;
//  $_SESSION['user_city'] = $city;
//  $_SESSION['user_postalCode'] = $postalCode;

  setcookie("user_code", $lastCode +1, time() + 86400, "/");
  setcookie("user_firstName", $firstName, time() + 86400, "/");
  setcookie("user_lastName", $lastName, time() + 86400, "/");
  setcookie("user_email", $email, time() + 86400, "/");
  setcookie("user_password", $password, time() + 86400, "/");
  setcookie("user_address", $address, time() + 86400, "/");
  setcookie("user_city", $city, time() + 86400, "/");
  setcookie("user_stateOrProvince", $stateOrProvince, time() + 86400, "/");
  setcookie("user_postalCode", $postalCode, time() + 86400, "/");

  header("Location: ../../index.php");
  }

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Sign Up </title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/backstore.css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
</head>
<body>

  <!-- Navbar -->
  <?php include('header.php'); ?>

    <div class="page-name">
        <div>
           Sign Up
        </div>
    </div>

    <section class="subheader">
        <nav class="subheader-nav">
            <ul class="navbar navbar-left">
                <li class="aisle-link">
                    <a href="../../../public/php/bakery_aisle.php">Bakery</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../../public/html/beverages-aisle.html">Beverages</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/dairyandeggs-aisle.html">
                        Dairy & Eggs
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/fruitsandveg-aisle.html">
                        Fruits & Vegetables
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../../public/php/poultry-aisle.php">Meat, Poultry & Fish</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../../public/php/snack_aisle.php">Snacks</a>
                </li>
            </ul>
            <ul class="navbar navbar-right">
                <li class="cart-link">
                    <a href="../../public/html/cart.html">
                        <img class="cart-icon" src="../../images/cart_transparent_black.png" alt="">
                    </a>
                </li>
                <li class="cart-link">
                    <a href="../../public/html/cart.html">Cart</a>
                </li>
            </ul>
        </nav>
    </section>

    <div class="flex-wrapper">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
          <div class="card text-center">
                  <div class="card-header bg-dark text-white">
                      <h1>Create an account</h1></div>

          <div class="card-body my-auto" style="display:flex; flex-direction:column; align-items: space-around; ">
            <form action="" method = "POST"  style="display:flex; flex-direction:column; align-items:flex-start; padding-left:0px">
              <div style="color:red;">*Field Required</div>
              <div >
                <input class="inputField" type="text" placeholder="First Name" name = "firstName">
                <span style="color:red;"> <?php echo $firstNameErr;?></span>
              </div>
              <div>
                <input class="inputField" type="text" placeholder="Last Name" name = "lastName">
                  <span style="color:red; "> <?php echo $lastNameErr;?></span>
              </div>
              <input class="inputField" type="text" placeholder="Address" name = "address">
              <input class="inputField" type="text" placeholder="City" name = "city">
              <input class="inputField" type="text" placeholder="State/Province" name = "stateOrProvince">
              <input class="inputField" type="text" placeholder="Postal Code" name = "postalCode">
              <div>
                <input class="inputField" type="text" placeholder="Email" name = "email">
                  <span style="color:red;"> <?php echo $emailErr;?></span>
              </div>
              <div>
                <input class="inputField " type="password" placeholder="Password (8-12 characters)" name = "password">
                  <span style="color:red;"> <?php echo $passwordErr;?></span>
              </div>
              <div>
                <input class="inputField " type="password" placeholder="Confirm Password" name="confirmPassword">
                  <span style="color:red;"> <?php echo $confirmPasswordErr;?></span>
              </div>
              <div class="formButtons" style="align-self:center;">
                    <input type="submit" name = "submit" value = "Sign Up" class="btn btn-primary mt-3 mb-3">
                    <button type="button"  class="btn btn-danger mt-3 mb-3">Clear</button>
                </div>
            </form></div>
            <div class="card-footer bg-dark">
                <h6>Already have an account? <a class="clickhere" href="../html/login.html"> Click here to login</a></h6>
              </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <?php include('footer.php'); ?>


</body>
</html>
