<?php
session_start();
if (!isset($_COOKIE['user_code']) || $_COOKIE['user_code'] != "0") {
    header("Location: access_denied.php");
}

// This part is only to fill in default values of form input fields
$code = $_GET["product_code"];
$file = simplexml_load_file("../../product_info_test.xml");
foreach ($file->children() as $aisle) { // loop through each aisle
    foreach ($aisle->product as $product) { // loop through each product in the aisle
        if ($product->code == $code) {
            $name = $product->name;
            $brand = $product->brand;
            $weight = $product->weight;
            $price = $product->price;
            $description = $product->description;
            break;
        }
    }
}

if (isset($_POST["product-code"])) {
    $num_products = $file->xpath("//total_products")[0];

    if ($num_products < $_POST["product-code"]) {
        $not_found = true;
    } else {
        $product = $file->xpath("//product[./code = '{$_POST["product-code"]}']")[0];
        $product->name = $_POST["product-name"];
        $product->brand  = $_POST["product-brand"];
        $product->weight = $_POST["product-weight"];
        $product->price  = $_POST["product-price"];
        $product->description  = $_POST["product-description"];
        file_put_contents("../../product_info_test.xml", $file->asXML());

        header("Location: product_list.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/michael_backend.css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
    <title>McJawz | Edit Product</title>
</head>

<body>

    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Page Name -->
    <section class="page-name">
        <div>
            Edit Product <?= $_GET["product_code"] ?>
        </div>
    </section>

    <!-- Subheader -->
    <section class="subheader">
        <nav class="subheader-nav">
            <ul class="navbar navbar-left">
                <li class="aisle-link">
                    <a href="../../../public/php/bakery_aisle.php">Bakery</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../../public/php/beverage-aisle.php">Beverages</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../../public/php/fruitsandveg-aisle.php">Fruits & Vegetables</a>
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

    <!-- Edit Product -->
    <section class="edit-product">
        <form class="form" action="./edit_product.php" method="post">

            <?php if (isset($_GET["product_code"])) { ?>
                <input type="hidden" id="product-code" name="product-code" value="<?php echo $code ?>" style="width: 30px;" />
            <?php } else { ?>
                <label class="mt-3" for="product-code">Product code</label>
                <h5>Note: This is the product code of the product you want to edit. This product code must exist and cannot be changed.</h5>
                <input type="text" id="product-code" name="product-code" value="" style="width: 30px;" />

            <?php if ($not_found) {
                    echo "<p style='color: red; font-style: italic'>Product does not exist.</p>";
                }
            } ?>

            <label class=" mt-3" for="product-name">Product name</label>
            <input type="text" id="product-name" name="product-name" value="<?php echo $name ?>" />

            <label class="mt-3" for="product-brand">Product brand</label>
            <input type="text" id="product-brand" name="product-brand" value="<?php echo $brand ?>" />

            <div class="weight-input d-inline-block">
                <label class="mt-3" for="product-weight">Product weight</label>
                <input class="d-inline w-25" type="text" id="product-weight" name="product-weight" value="<?php echo $weight ?>">
            </div>

            <label class="mt-3" for="product-description">Product description</label>
            <textarea id="product-description" name="product-description"><?php echo $description ?></textarea>

            <div class="price-input d-inline-block">
                <label class="mt-3" for="product-price">Product price</label>

                <p class="d-inline">$</p>
                <input class="d-inline w-25" type="number" step="0.01" id="product-price" name="product-price" value="<?php echo $price ?>">
            </div>

            <button type="submit" class="btn btn-blue shadow-none mt-5">Save</button>

        </form>
    </section>

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