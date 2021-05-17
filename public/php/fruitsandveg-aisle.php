<?php session_start();

?>
<?php
    $product_code = $_GET["product_code"];
    if (isset($_POST["product-qty-" . $product_code])) {
        $_SESSION["product-qty-cart-" . $product_code] = $_POST["product-qty-" . $product_code];

        echo $_SESSION["product-qty-cart-" . $product_code];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>McJawz | Fruit & Veg</title>
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/fruitsandveg-aisle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="../../../public/js/fruitsandveg-aisle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="updateValues()">

    <?php include('header.php'); ?>

    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Fruits and Vegetables</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 aisles">
                <a href="../../../public/html/aisles/bakery.html">Bakery</a>
                |
                <a href="../../../public/html/aisles/beverages-aisle.html">Beverages</a>
                |
                <a href="../../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
                |
                <a href="../../../public/html/aisles/fruitsandveg-aisle.html">Fruits & Vegetables</a>
                |
                <a href="../../../public/html/aisles/poultry-aisle.html">Meat, Poultry & Fish</a>
                |
                <a href="../../../public/html/aisles/snack_aisle.html">Snacks</a>
            </div>

            <div class="col-lg-6 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>


    <div class="card-deck">

        <div class="row">

            <?php
                $all_products = simplexml_load_file("../../product_info_test.xml");
                foreach ($all_products->fruits_vegetables_aisle->product as $product){
                    $code = (int)$product->code;
                    $name = $product->name;
                    $brand = $product->brand;
                    $weight = $product->weight;
                    $price = $product->price;
                    $s_des = $product->s_des;
                    $calorie = $product->calorie;
                    $unit = $product->unit;
            ?>

                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        <a class="item-link" href='./fruitsandveg-product.php?code=<?= $code ?>'>
                            <img class="card-img-top" src="../../../images/product_<?= $code ?>.jpg" alt="<?= $name ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $name ?></h5>
                                <p class="card-text"><?= $s_des ?></p>
                                <p class="card-text"><small class="text-muted"><?= $calorie ?></small></p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <p class="pricing"><b><?= $price ?>/<?= $unit?></b></p>

                            <div class="row quantity">
                                <div class="col-lg-12 incDecButton">
                                    <span class="input-group-btn">
                                        <button onclick="decrement('amount-<?=$code?>');" type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                            -
                                        </button>
                                    </span>
                                    <input id='amount-<?=$code?>' size="3" type = "text" value="1">
                                    <span class="input-group-btn">
                                        <button onclick="increment('amount-<?=$code?>');" type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span>
                                </div>
                                <div class="col-lg-12 addToCart">
                                    <button type="button" class="btn btn-info">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>


    <?php include('footer.php'); ?>




</body>

</html>
