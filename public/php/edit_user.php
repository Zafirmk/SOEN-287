<?php
session_start(); //Starting the session
$xml = simplexml_load_file("../../user_info.xml");//Loading XML file in an object
if($_COOKIE['user_code']==0 && isset($_GET['code'])){
  $code = $_GET['code'];
  $users = $xml->xpath("/root/userList/user[code=".$code."]");
  $user = $users[0][0];

  $firstName = $user->firstName;
  $lastName = $user->lastName;
  $email = $user->email;
  $password = $user->password;
  $address = $user->address;
  $city = $user->city;
  $stateOrProvince = $user->stateOrProvince;
  $postalCode =  $user->postalCode;
}
else{
  $code = $_COOKIE['user_code'];
  $firstName = $_COOKIE['user_firstName'];
  $lastName = $_COOKIE['user_lastName'];
  $email = $_COOKIE['user_email'];
  $password = $_COOKIE['user_password'];
  $address = $_COOKIE['user_address'];
  $city = $_COOKIE['user_city'];
  $stateOrProvince = $_COOKIE['user_stateOrProvince'];
  $postalCode =  $_COOKIE['user_postalCode'];
}


if(isset($_POST['submitEdit'])){//The user pushed the Edit button
  $users = $xml->xpath("/root/userList/user[code=".$code."]");
  $user = $users[0][0];

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $stateOrProvince = $_POST['stateOrProvince'];
  $postalCode =  $_POST['postalCode'];

  $user->firstName = $_POST['firstName'];
  $user->lastName = $_POST['lastName'];
  $user->email = $_POST['email'];
  $user->password = $_POST['password'];
  $user->address = $_POST['address'];
  $user->city = $_POST['city'];
  $user->stateOrProvince = $_POST['stateOrProvince'];
  $user->postalCode =  $_POST['postalCode'];


  $xml->asXML("../../user_info.xml");//Saving to XML file

  if($_COOKIE['user_code']!=0){
  setcookie("user_code", $code, time() + 86400, "/");
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
    else{
  header("Location: user_list.php");
  }
}
if(isset($_POST['submitDelete'])){//The user pushed the Delete Account button

  $currentAmount = $xml->amount;
  $currentCode;//Holds the code of the user to be deleted
  if($code=="0"){

  }
  else{
    $currentCode = $code;
  }
  //Deleting the user from the xml file
  $users = $xml->xpath("/root/userList/user[code=".$currentCode."]");
  unset($users[0][0]);

  $xml->amount = intval($currentAmount)-1;//Decreasing the amount value in XML
  $xml->asXML("../../user_info.xml");
header("Location: logout.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Account Info </title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/backstore.css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
</head>
<body>

  <!-- Navbar -->
  <?php include('header.php'); ?>

    <div class="page-name">
        <div>
           Account Information : <?php echo $email; ?>
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
                      <h1>Edit your account</h1></div>

          <div class="card-body my-auto ">

            <form action="" method = "POST">
              <input class="inputField" type="text"  name = "firstName" value="<?php echo $firstName; ?>"><br>
              <input class="inputField" type="text"  name = "lastName" value="<?php echo $lastName; ?>"><br>
              <input class="inputField" type="text"  name = "address"  value="<?php echo $address; ?>"><br>
              <input class="inputField" type="text" name = "city"  value="<?php echo $city; ?>"><br>
              <input class="inputField" type="text"  name = "stateOrProvince"  value="<?php echo $stateOrProvince; ?>"><br>
              <input class="inputField" type="text"  name = "postalCode"  value="<?php echo $postalCode; ?>"><br>
              <input class="inputField" type="text" name = "email"  value="<?php echo $email; ?>"><br>
              <input class="inputField " type="password" name = "password"  value="<?php echo $password; ?>"><br>

                <div class="formButtons">
                    <input type="submit" name = "submitEdit" value = "Edit" class="btn btn-primary mt-3 mb-3">

                      <form class="" action="" method="POST">
                        <input type="submit" name="submitDelete" value="Delete Account" class="btn btn-danger mt-3 mb-3" <?php if($_COOKIE['user_code']==0){echo "disabled";} ?>>
                      </form>
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
