<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/backstore.css">

    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />

    <title>McJawz | Edit Order</title>
</head>
<body>
    <!--HEADER-->
    <!-- Navbar -->
    <?php include('header.php'); ?>

    <!--PAGE NAME-->
    <div class="page-name">
        <div>
            Edit Order
        </div>
    </div>

    <!--SUBHEADER-->
    <div class="subheader">
        <nav class="subheader-nav">
            <ul class="navbar navbar-left">
                <li class="aisle-link">
                    <a href="../../public/html/aisles/bakery.html" >
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
                    <a href="../../public/html/aisles/fruitsandveg-aisle.html" >
                        Fruits & Vegetables
                    </a>
                </li>

                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/poultry-aisle.html">
                        Meat, Poultry & Fish
                    </a>
                </li>
                <li class="link-sep">|</li>
                <li class="aisle-link">
                    <a href="../../public/html/aisles/snack_aisle.html">
                        Snacks
                    </a>
                </li>
            </ul>
            <ul class="navbar navbar-right">
                <li class="cart-link">
                    <a href="../../public/html/cart.html" >
                        <img class="cart-icon" src="../../../images/cart_transparent_black.png" alt="">
                    </a>
                </li>
                <li class="cart-link">
                    <a href="../../public/html/cart.html">Cart</a>
                </li>
            </ul>
        </nav>
    </div>

    <!--EDIT ORDERS-->
    <div class="flex-wrapper">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
            <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h1>Edit an Order</h1>
                </div>
                <div class="card-body my-auto ">
                    <form method = "POST" action = "edit_order.php">
                        Please select order number wished to be edited<input type = "text" name = "order_num"><br>
                        Please enter the user's name <input type = "text" name = "user"><br>
                        Please enter the new order list <input type = "text" name = "orderList" style = "height:200px"><br>
                        <input type="submit" name = "edit" value = "Edit" class="btn btn-primary mt-3 mb-3">
                    </form>
                </div>
                <?php
                    session_start();
                    if(isset($_POST['edit'])){
                        $xml = new DomDocument();
                        $xml->load('../../order_info.xml');

                        //del order
                        $orderNum = $_POST['order_num'];

                        $xpath = new DOMXPath($xml);

                        foreach($xpath -> query("/order_list/order[order_num = '$orderNum']") as $node){
                            $node->parentNode->removeChild($node);

                        }
                        $xml -> formatoutput = true;
                        $xml -> save('../../order_info.xml');

                        //add order
                        $newUser = $_POST['user'];
                        $newOrderNum = $_POST['order_num'];
                        $newOrderList = $_POST['orderList'];

                        $rootTag = $xml -> getElementsByTagname('order_list') -> item(0);

                        $infoTag = $xml -> createElement("order");
                        $userTag = $xml -> createElement("user", $newUser);
                        $orderNumTag = $xml -> createElement("order_num", $newOrderNum);
                        $orderListTag = $xml -> createElement("orderList", $newOrderList);

                        $infoTag ->appendChild($userTag);
                        $infoTag ->appendChild($orderNumTag);
                        $infoTag ->appendChild($orderListTag);

                        $rootTag -> appendChild($infoTag);
                        $xml->save('../../order_info.xml');


                        echo ("Your order has been successfully edited!");
                        echo ("Your username is " + $newUser + ".");
                        echo ("Your order number is " + $newOrderNum + ".");
                        echo ("Your new order is " + $newOrderList + ".");

                    }
                ?>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <?php include('footer.php'); ?>

</body>
</html>
