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
    <title>McJawz | User List</title>
</head>

<body>

    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Page Name -->
    <section class="page-name">
        <div>
            User List
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

    <!-- User List -->
    <section class="user-list">
        <table class="table table-bordered bg-white">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State/Province</th>
                    <th scope="col">Postal Code</th>
                    <th class="btn-col" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = simplexml_load_file("../../user_info.xml");
                foreach ($file->userList->user as $user) {
                    $code = (int)$user->code;
                    $first_name = $user->firstName;
                    $last_name = $user->lastName;
                    $email = $user->email;
                    $address = $user->address;
                    $city = $user->city;
                    $state_province = $user->stateOrProvince;
                    $postal_code = $user->postalCode;
                ?>
                    <tr>
                        <td><?= $code ?></td>
                        <td><?= $first_name ?></td>
                        <td><?= $last_name ?></td>
                        <td><?= $email ?></td>
                        <td><?= $address ?></td>
                        <td><?= $city ?></td>
                        <td><?= $state_province ?></td>
                        <td><?= $postal_code ?></td>
                        <td>
                            <div class="btn-cell">
                                <a href="../../public/php/edit_user.php?code=<?= $code ?>" class="btn shadow-none btn-yellow">Edit</a>
                                <a href="../../public/php/delete_user.php?code=<?= $code ?>" class="btn shadow-none btn-red">Delete</a>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

        <a href="../php/add_user.php" class="btn btn-blue shadow-none">Add User</a>

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