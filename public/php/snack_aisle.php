<?php session_start(); ?>

<?php
$product_code = $_GET["product_code"];
if (isset($_POST["product-qty-" . $product_code])) {
    $_SESSION["product-qty-cart-" . $product_code] = $_POST["product-qty-" . $product_code];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>McJawz | Snacks</title>
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../../public/css/bootstrap.css" />
    <link rel="stylesheet" href="../../public/css/michael_snacks.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet" />
    <script type="text/javascript" src="../../public/js/michael.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="updateQuantities(); updateProductInfo()">

    <!-- Navbar -->
    <?php include('header.php'); ?>

    <!-- Subheader -->
    <div class="subheader container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Snacks</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 aisles text-dark">
                <a href="../../../public/php/bakery_aisle.php">Bakery</a>
                |
                <a href="../../../public/php/beverage-aisle.php">Beverages</a>
                |
                <a href="../../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
                |
                <a href="../../../public/php/fruitsandveg-aisle.php">Fruits & Vegetables</a>
                |
                <a href="../../../public/php/poultry-aisle.php">Meat, Poultry & Fish</a>
                |
                <a href="../../../public/php/snack_aisle.php">Snacks</a>
            </div>

            <div class="col-lg-4 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="" />
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Items -->
    <div class="aisle-page card-deck">
        <div class="row">

            <?php
            $products = simplexml_load_file("../../product_info_test.xml");
            foreach ($products->snacks_aisle->product as $product) {
                $code = (int)$product->code;
                $name = $product->name;
                $brand = $product->brand;
                $weight = $product->weight;
                $price = $product->price;
            ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card text-center">
                        <a class="item-link" href="./snack_product.php?product_code=<?= $code ?>">
                            <img class="card-img-top" src="../../images/product_<?= $code ?>.jpg" alt="product <?= $code ?>" />
                            <div class="card-body">
                                <h5 class="card-title mt-4" id="product-name-<?= $code ?>"> <?= $name ?> </h5>
                                <p class="card-text text-muted" id="product-brand-<?= $code ?>"> <?= $brand ?> </p>
                                <p class="card-text text-muted" id="product-weight-<?= $code ?>">
                                    <small><?= $weight ?></small>
                                </p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <form action="./snack_aisle.php?product_code=<?= $code ?>" method="post">
                                <div class="pricing m-auto">
                                    <p class="base-price d-inline" id="product-price-<?= $code ?>">$ <?= $price ?> </p>
                                    <p class="d-inline ml-3" id="product-subtotal-<?= $code ?>">(Subtotal: $<?= $price ?> )</p>
                                </div>
                                <div class="row quantity justify-content-around">
                                    <div class="">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-minus btn btn-danger btn-number" onclick="minus(<?= $code ?>); updateProductSubtotal(<?= $code ?>)" data-type="minus" data-field="">-</button></span>

                                        <input class="quantity-input" name="product-qty-<?= $code ?>" id="product-qty-<?= $code ?>" size="3" type="text" value="1">

                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-plus btn btn-success btn-number" onclick="plus(<?= $code ?>); updateProductSubtotal(<?= $code ?>)" data-type="plus" data-field="">+</button></span>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-info btn-cart">
                                            <img style="margin-right: 10px;" class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">Add to cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php }

            ?>

        </div> <!-- class="row" -->
    </div>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-item ml-3">
            <a href="../../public/php/admin.php">
                <p>Admin</p>
            </a>
        </div>
    </section>
</body>

</html>