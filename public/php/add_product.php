<?php
session_start();
session_start();
if (!isset($_COOKIE['user_code']) || $_COOKIE['user_code'] != "0") {
    header("Location: access_denied.php");
}

if (
    isset($_POST["product-aisle"]) &&
    isset($_POST["product-name"]) &&
    isset($_POST["product-brand"]) &&
    isset($_POST["product-weight"]) &&
    isset($_POST["product-description"]) &&
    isset($_POST["product-price"])
) {
    $file = simplexml_load_file("../../product_info_test.xml");



    switch ($_POST["product-aisle"]) {
        case "bakery":
            $aisle = $file->bakery_aisle;
            break;
        case "beverages":
            $aisle = $file->beverages_aisle;
            break;
        case "dairy-eggs":
            $aisle = $file->dairy_eggs_aisle;
            break;
        case "fruits-veg":
            $aisle = $file->fruits_vegetables_aisle;
            break;
        case "meat-fish-poultry":
            $aisle = $file->meat_poultry_fish_aisle;
            break;
        case "snacks":
            $aisle = $file->snacks_aisle;
            break;
    }

    $num_products = $file->xpath("//total_products")[0];
    $high_code = $file->xpath("//highest_product_code")[0];

    $new_product = $aisle->addChild("product");
    $new_product->addChild("code", $high_code + 1);
    $new_product->addChild("name", $_POST["product-name"]);
    $new_product->addChild("brand", $_POST["product-brand"]);
    $new_product->addChild("description", $_POST["product-description"]);
    $new_product->addChild("price", $_POST["product-price"]);
    $new_product->addChild("weight", $_POST["product-weight"]);
    $new_product->addChild("quantity", 10);

    $file->total_products = $num_products + 1;
    $file->highest_product_code = $high_code + 1;

    file_put_contents("../../product_info_test.xml", $file->asXML());

    header("Location: product_list.php");
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
    <title>McJawz | Add Product</title>
</head>

<body>

    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Page Name -->
    <section class="page-name">
        <div>
            Add Product
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
        <form class="form" action="./add_product.php" method="post">

            <label for="product-aisle">Product aisle</label>
            <select class="form-control" id="product-aisle" name="product-aisle">
                <option value="bakery">Bakery</option>
                <option value="beverages">Beverages</option>
                <option value="dairy-eggs">Dairy & Eggs</option>
                <option value="fruits-veg">Fruits & Vegetables</option>
                <option value="meat-fish-poultry">Meat, Fish & Poultry</option>
                <option value="snacks">Snacks</option>
            </select>

            <label class=" mt-3" for="product-name">Product name</label>
            <input type="text" id="product-name" name="product-name" value="" />

            <label class="mt-3" for="product-brand">Product brand</label>
            <input type="text" id="product-brand" name="product-brand" value="" />

            <div class="weight-input d-inline-block">
                <label class="mt-3" for="product-weight">Product weight</label>
                <input class="d-inline w-25" type="text" id="product-weight" name="product-weight" value="">
            </div>

            <label class="mt-3" for="product-description">Product description</label>
            <textarea id="product-description" name="product-description"></textarea>

            <div class="price-input d-inline-block">
                <label class="mt-3" for="product-price">Product price</label>

                <p class="d-inline">$</p>
                <input class="d-inline w-25" type="number" step="0.01" id="product-price" name="product-price" value="">
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