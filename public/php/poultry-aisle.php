<?php session_start();

?>
<?php
for($i=0; $i<1000; $i++){
if(isset($_POST['amount-'.$i])){
$_SESSION['product-qty-cart-'.$i]=$_POST['amount-'.$i];
echo $_SESSION['product-qty-cart-'.$i];}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>McJawz | Meat, Poultry & Fish</title>
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/fruitsandveg-aisle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon">
    <script src="../../../public/js/poultry-aisle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="updateAllValues()">

      <!-- Navbar -->
  <?php include('header.php'); ?>


    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2>Meat, Poultry and Fish</h2>
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

    <!-- Items -->
    <div class="card-deck">


        <div class="row">
<?php
$xml = simplexml_load_file("../../product_info_test.xml");
foreach($xml->meat_poultry_fish_aisle->product as $item){
    if($item->code==""){
        continue;
        }
    $code= (int)$item->code;
    $name=$item->name;
    $weight=$item->weight;
    $brand=$item->brand;
    $price=$item->price;
    ?>


            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <a class="item-link" href='./poultry-aisle-product.php?code=<?= $code ?>' >
                        <img class="card-img-top" src="../../../images/product_<?= $code?>.jpg" alt="Meat,Poultry and Fish">
                        <div class="card-body">
                            <h5 class="card-title"><?= $name?></h5>
                            <p class="card-text"><?= $brand?></p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <p class="pricing"><b><?= $price ?>/<?= $weight ?></b></p>
                        <div class="row quantity">

                            <div class="col-lg-12 incDecButton">
                                <span class="input-group-btn">
                                    <button onclick="decrement('amount-<?=$code?>');" type="button" class="quantity-left-minus btn btn-danger btn-number"
                                        data-type="minus" data-field="">-
                                    </button>
                                </span>

                                <input id='amount-<?=$code?>' size="3" value="1">

                                    <span class="input-group-btn">
                                        <button onclick="increment('amount-<?=$code?>',)"; type="button" class="quantity-right-plus btn btn-success btn-number"
                                        data-type="plus" data-field="">+
                                        </button>
                                    </span>
                            </div>
                            <div class="justify-content-center" >
                            <form id="myForm" action="" method="POST" >
                            <div class="col-lg-12 addToCart ">
                            <button onclick="mySubmit('submit-<?=$code?>',<?=$code?>);"class="btn btn-info">Add to cart</button>
                            <input type="hidden" id="submit-<?=$code?>" name="amount-<?=$code?>" value="">
                             </form>
                             </div>
                    <script>
                    function mySubmit(name1,number) {
                        var name='amount-'+number;
                        var val=sessionStorage[name];
                                  document.getElementById(name1).value=val;
                                document.getElementById("myForm").submit();}</script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

    <!-- Footer -->
    <?php include('footer.php'); ?>




</body>

</html>
