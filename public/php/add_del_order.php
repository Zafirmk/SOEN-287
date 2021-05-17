<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>McJawz | Order List </title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/backstore.css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
</head>
<body>

  <!-- Navbar -->
  <?php include('header.php'); ?>

    <div class="page-name">
        <div>
           Order List
        </div>
    </div>


    <!-- ADD AN ORDER -->
    <div class="flex-wrapper">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
          <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h1>Create an order</h1>
                </div>
                <?php
                    session_start();
                    $xml = simplexml_load_file('../../order_info.xml');
                    if (isset($_POST['insert'])){
                        //$xml = simplexml_load_file('../../order_info.xml');
                        //$currentAmount = $xml->amount;
                        //$newOrder = $xml -> order_list-> addChild("order");
                        //$newUser = $xml ->addChild("user", $_POST['user']);
                        //$newOrderNum = $xml ->addChild("order_num", $_POST['order_num']);
                        //$newOrderList = $xml ->addChild("orderList", $_POST['orderList']);
                        //$xml->amount = intval($currentAmount)+1;
                        //$xml->asXML("../../order_info.xml");

                        $xml = new DomDocument("1.0", "UTF-8");
                        $xml -> load('../../order_info.xml');

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
                    

                        echo ("Your order has been successfully added!");
                    }
                ?>

                <div class="card-body my-auto ">
                    <form method = "POST" action="add_del_order.php">
                        Order Info wished to be added</br>
                        User Name <input type = "text" name = "user"></br>
                        Order Number <input type = "text" name = "order_num"></br>
                        Order List <input type = "text" name = "orderList"></br>
                        <input type="submit" name = "insert" value = "Add" class="btn btn-primary mt-3 mb-3">
                    </form>
                </div>
            </div>
        </div>


        <!-- DELETE AN ORDER-->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
            <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h1>Delete an order</h1>
                </div>
                <div class="card-body my-auto ">
                    <form method = "POST" action = "add_del_order.php">
                        Order wished to be deleted <br>
                        Order Number <input type = "text" name = "order_num"><br>
                        <input type="submit" name = "delete" value = "Delete" class="btn btn-primary mt-3 mb-3">
                    </form>
                </div>
                <?php
                    session_start();
                    if(isset($_POST['delete'])){
                        $xml = new DomDocument("1.0", "UTF-8");
                        $xml->load('../../order_info.xml');

                        $orderNum = $_POST['order_num'];

                        $xpath = new DOMXPath($xml);

                        foreach($xpath -> query("/order_list/order[order_num = '$orderNum']") as $node){
                            $node->parentNode->removeChild($node);

                        }

                        $xml -> save('../../order_info.xml');

                        echo ("Your order has been successfully deleted!");

                    }
                ?>
            </div>
        </div>
    </div>




    <?php include('footer.php'); ?>

</body>
</html>
