<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/allproducts.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

</head>

<body onload="updateValues()">
  <!-- Navbar -->
  <?php include('header.php'); ?>

    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Access Denied</h2>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-6 aisles">
              <a href="../../public/html/aisles/bakery.html">Bakery</a>
              |
              <a href="../../public/html/aisles/beverages-aisle.html">Beverages</a>
              |
              <a href="../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
              |
              <a href="../../public/html/aisles/fruitsandveg-aisle.html">Fruits & Vegetables</a>
              |
              <a href="../../public/html/aisles/poultry-aisle.html">Meat, Poultry & Fish</a>
              |
              <a href="../../public/html/aisles/snack_aisle.html">Snacks</a>
            </div>

            <div class="col-lg-6 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>

<!--Content-->
    <div class="container-fluid" style="text-align:center; padding-top:20px;">
      <h2>You don't have the rights to access this page.</h2>
      <button type="button" class="btn btn-primary btn-lg"
       style="background-color:rgb(51, 51, 51); color:white; border-color:rgb(51, 51, 51); margin:20px;"
       name="button" > <a href="../../index.php">Return to home page</button>
    </div>

    <!-- Navbar -->
    <?php include('footer.php'); ?>




</body>

</html>
