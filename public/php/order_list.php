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
    <link rel="stylesheet" href="../../public/css/backstore.css">

    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />

    <title>McJawz | Order List</title>
</head>

<body>
    <!--HEADER-->
    <div class="header">
        <nav class="header-nav">
            <ul class="navbar navbar-left">
                <li class="logo">
                    <a class="mr-2" href="../../public/index.php">
                        <img src="../../images/mcJawz_logo_no_txt.png" alt="">
                    </a>
                </li>
                <li class="logo">
                    <a href="../../public/index.php" >
                        McJawz                    
                    </a>
                </li>
            </ul>
            <ul class="navbar navbar-right">
                <li class="login-signup">
                    <a href="../../public/php/login.php">
                        Login
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="login-signup">
                    <a href="#">
                        Sign Up
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--PAGE NAME-->
    <div class="page-name">
        <div>
            Order List
        </div>
    </div>

    <!--SUBHEADER-->
    <div class="subheader">
        <nav class="subheader-nav">
            <ul class="navbar navbar-left">
                <li class="aisle-link">
                    <a href="../../public/php/bakery_aisle.php" >
                        Bakery                    
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/beverages-aisle.html">
                        Beverages
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/dairyandeggs-aisle.html">
                        Dairy & Eggs
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/php/fruitsandveg-aisle.php" >
                        Fruits & Vegetables                    
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/php/poultry-aisle.php">
                        Meat, Poultry & Fish
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/php/snack_aisle.php">
                        Snacks
                    </a>
                </li>
            </ul>
            <ul class="navbar navbar-right">
                <li class="cart-link">

                    <a href="../../public/php/cart.php" >
                        <img class="cart-icon" src="../../../images/cart_transparent_black.png" alt="">
                    </a>
                </li>
                <li class="cart-link">
                    <a href="../../public/php/cart.php">Cart</a>
                </li>
            </ul>
        </nav>
    </div>

    <!--ORDER LIST-->
    <div class="user-list">
        <table class="table table-bordered bg-white">
            <tr class="thead-dark">
                <th scope="col" style="text-align: center;">User</th>
                <th scope="col" style="text-align: center;">Order Number</th>
                <th scope="col" style="text-align: center;">Order List</th>
                <th scope="col" style="text-align: center;">Functions</th>
            </tr>
            <tbody>

                <?php
                
                $file = simplexml_load_file("../../order_info.xml");
                foreach($file->order_list->order as $order){
                    $user = $order->user;
                    $code = (int)$order->order_num;
                    $orderList = $order->orderList;
                
                ?>

                <tr style="text-align: center;">
                    <td><?= $user ?></td>
                    <td><?= $code ?></td>
                    <td>

                        <?php
                            $items_purchased = explode(", ", $orderList);
                            foreach($items_purchased as $item){
                        ?>
                            <h6><?= $item ?></h6>
                        <?php
                            }
                        ?>

                    </td>
                    <td>
                        <a href="../../public/php/edit_order.php" class="btn btn-info">Edit</a>
                        <a href="../../public/php/add_del_order.php" class="btn btn-info">Delete</a>
                    </td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>



    <!--FOOTER-->
    <div class="footer">
        <div class="footer-item ml-3">
            <a href="../../public/html/admin.html">
                <p>Admin</p>
            </a>
        </div>
    </div>
</body>

</html>
