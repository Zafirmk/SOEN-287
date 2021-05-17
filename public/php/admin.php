<?php
if (!isset($_COOKIE['user_code']) || $_COOKIE['user_code'] != "0") {
    header("Location: access_denied.php");
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
    <title>McJawz | Admin</title>
</head>

<body>

    <!-- Navbar -->
    <?php include('header.php'); ?>

    <!-- Page Name -->
    <section class="page-name">
        <div>
            Admin
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

    <!-- Admin -->
    <section class="admin my-5">
        <div class="card-deck">
            <a href="../../public/php/product_list.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P7</h1>
                        <p>Product List</p>
                    </div>
                </div>
            </a>
            <a href="../../public/php/edit_product.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P8</h1>
                        <p>Edit Product</p>
                    </div>
                </div>
            </a>
            <a href="../../public/php/add_product.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P8</h1>
                        <p>Add Product</p>
                    </div>
                </div>
            </a>
            <a href="../../public/html/user_list.html" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P9</h1>
                        <p>User List</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-deck mt-4">
            <a href="../../public/php/edit_user.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P10</h1>
                        <p>Edit User</p>
                    </div>
                </div>
            </a>
            <a href="../../public/php/order_list.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P11</h1>
                        <p>Order List</p>
                    </div>
                </div>
            </a>
            <a href="../../public/php/add_del_order.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P11</h1>
                        <p>Add and Delete Order</p>
                    </div>
                </div>
            </a>
            <a href="../../public/php/edit_order.php" class="back-page-link">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-text">P12</h1>
                        <p>Edit Order</p>
                    </div>
                </div>
            </a>
        </div>
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
