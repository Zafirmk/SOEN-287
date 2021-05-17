<?php session_start();

$amount[0] = $_POST["test"];
//$_SESSION["test"] = $amount . 7;

if (isset($_POST["test"])) {
  $_SESSION["amount"] = $_POST["test"];

  echo $_SESSION["amount"];
  echo $code;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>McJawz | Dairy & Eggs</title>
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/fruitsandveg-aisle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src = "../js/dairyandeggs-aisle.js"></script>

</head>

<body onload = 'setValues()'>

    <!-- Navbar -->

 <?php include('header.php'); ?>

    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Dairy & Eggs</h2>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-6 aisles">
              <a href="../../../public/php/bakery_aisle.php">Bakery</a>
              |
              <a href="../../../public/php/beverage-aisle.php">Beverages</a>
              |
              <a href="../../../public/php/dairyandeggs-aisle.php">Dairy & Eggs</a>
              |
              <a href="../../../public/php/fruitsandveg-aisle.php">Fruits & Vegetables</a>
              |
              <a href="../../../public/php/poultry-aisle.php">Meat, Poultry & Fish</a>
              |
              <a href="../../../public/php/snack_aisle.php">Snacks</a>
            </div>

            <div class="col-lg-6 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/php/cart.php">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Items -->
    <div class="card-deck">

        <div class="row">

          <?php
              $all_products = simplexml_load_file("../../product_info_test.xml");
              foreach ($all_products->dairy_eggs_aisle->product as $product){
                  $code = (int)$product->code;
                  $name = $product->name;
                  $brand = $product->brand;
                  $desc = $product->description;
                  $price = $product->price;
                  $weight = $product->weight;
                  $extradesc = $product->extra_description;
                  $cal = $product->calories;

          ?>

            <div class="col-lg-4 col-sm-6">
                <div class="card">
                  <a class="item-link" href="dairyandeggs-product.php?code=<?=$code?>">
                      <img class="card-img-top" src="../../../images/product_<?=$code?>.jpg" alt="<?=$name?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $name ?></h5>
                            <p class="card-text"><?=$extradesc?></p>
                            <p class="card-text"><small class="text-muted"><?=$cal?></small></p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <p class="pricing"><b><?=$price?>/each</b></p>

                        <div class="row quantity">
                            <div class="col-lg-12 incDecButton">
                                <span class="input-group-btn">
                                    <button onclick="decrement('amount-<?=$code?>')" type="button" class="quantity-left-minus btn btn-danger btn-number"
                                        data-type="minus" data-field="">
                                        -
                                    </button>
                                    <input id='amount-<?=$code?>' size="3" type="text" value="1">

                                </span>
                                <span class="input-group-btn">
                                    <button onclick="increment('amount-<?=$code?>')" type="button" class="quantity-right-plus btn btn-success btn-number"
                                        data-type="plus" data-field="">
                                        +
                                    </button>
                                </span>
                            </div>
                            <div class="col-lg-12 addToCart">

                              <form method="POST">
                                <input id= "myText-<?php echo $code ?>" type="hidden" name="test" value="1">
                                <button type="submit" class="btn btn-info" onclick="getAmount()"> Add to Cart </button>
                              </form>
                              <script>

                              function getAmount(){

                                console.log(<?php echo $code ?>);
                                console.log(sessionStorage["amount-<?php echo $code ?>"]);
                                var a = sessionStorage["amount-<?php echo $code ?>"];
                                document.getElementById("myText-<?php echo $code ?>").value = a;
                              }
                              getAmount();

                              </script>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <?php } ?>
    </div>

    <!-- Footer -->

    <?php include('footer.php'); ?>


</body>


</html>
