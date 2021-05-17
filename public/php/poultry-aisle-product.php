<?php session_start();

?>
<?php

for($i=0; $i<100; $i++){
    if(isset($_POST['amount-'.$i])){
    $_SESSION['product-qty-cart-'.$i]=$_POST['amount-'.$i];}
    }

for($i=20;$i<28;$i++){
    if(isset($_SESSION['product-qty-cart-'.$i])){;

    }
}


$xml = simplexml_load_file("../../product_info_test.xml");
foreach($xml->meat_poultry_fish_aisle->product as $item){
    if($item->code==$_GET['code']){
    $code= (int)$item->code;
    $name=$item->name;
    $weight=$item->weight;
    $brand=$item->brand;
    $price=$item->price;
    $description=$item->description;
    $description2=$item->description2;
}
}
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Meat... |<?=$name?></title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/allproducts.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <script src="../../../public/js/poultry-aisle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="updateValue('amount-<?=$code?>')">

     <!-- Navbar -->
  <?php include('header.php'); ?>
    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Meat, Poultry and Fish | <?=$name?></h2>
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
                <a href="../php/poultry-aisle.php">Meat, Poultry & Fish</a>
                |
                <a href="../php/snack_aisle.php">Snacks</a>
</div>

            <div class="col-lg-6 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="row no-gutters">


            <div class="col-md-4">
                <img src="../../../images/product_<?=$code?>.jpg" class="card-img" alt="<?=$brand?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?=$name?></h2>
                    <p class="card-text"><?=$brand?></p>
                    <p class="card-text"><small class="text-muted">"<?=$description?></small></p>

                    <div class="row quantity">
                        <p class="pricing"><?=$price?>/<?=$weight?></p>
                        <p class="pricing" style="font-size: medium;" id="totalPrice">Sub total: $<?= $price?></p>
                        <div class="col-lg-12 incDecButton mb-2">
                            <span class="input-group-btn">
                                <button onclick="decrement('amount-<?=$code?>');totalprice('amount-<?=$code?>');" class="quantity-left-minus btn btn-danger btn-number"
                                    data-type="minus" data-field="">-
                                </button></span>

                            <input id='amount-<?=$code?>' size="3" value="1">

                            <span class="input-group-btn">
                            <button onclick="increment('amount-<?=$code?>');totalprice('amount-<?=$code?>');" type="button" class="quantity-right-plus btn btn-success btn-number"
                                    data-type="plus" data-field="">+
                            </button></span>
                        </div>
                        <form id="myForm" action="" method="POST">
                            <div class="col-lg-12 addToCart mb-3">
                            <button onclick="mySubmit('submit-<?=$code?>',<?=$code?>);"class="btn btn-info">Add to cart</button>
                            <input type="hidden" id="submit-<?=$code?>" name="amount-<?=$code?>" value="">
                             </form>

                    <script>
                    function mySubmit(name1,number) {
                        var name='amount-'+number;
                        var val=sessionStorage[name];
                                  document.getElementById(name1).value=val;
                                document.getElementById("myForm").submit();}</script>

                    </div>
                </div>

                <div class="accordian">
                    <input type="checkbox" id="title1"/>
                    <label onclick="ShowDescription()" for="title1">More Description</label>

                    <p id="description2" style="display:none;padding-top: 5px; padding-bottom: 5px;"><?php echo $description2 ?>
                    </p>



                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>



</body>

</html>
