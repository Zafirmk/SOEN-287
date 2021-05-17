<?php session_start();?>
<?php
if(isset($_POST['delete'])){

    $xml = simplexml_load_file("../../product_info_test.xml");
    $CodeToDelete=$_POST['delete'];
    $users = $xml->xpath("//product[./code = '{$CodeToDelete}']")[0];
    unset($users[0][0]);
    file_put_contents("../../product_info_test.xml",$xml->saveXML());}
?>



<?php
$xml = simplexml_load_file("../../product_info_test.xml");
foreach($xml->children()as $aisle){
foreach($aisle-> product as $item){
  $code= (int)$item->code;
  if(isset($_POST['add-'.$code])){
$quantity=$item->quantity;
$quantity+=$_POST['add-'.$code];
$item->quantity=$quantity;
file_put_contents("../../product_info_test.xml", $xml->asXML());
}
}

}

?>
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/backstore.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Product List</title>
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
    <script src="../../../public/js/poultry-aisle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<?php include('header.php'); ?> 

<section class="page-name">
    <div>
       Product List
    </div>
</section>
<body onload="updateAllValues()">
<a href="./add_product.php" class="btn btn-success btn-md mt-2 d-block ">Add Product</a>
<?php
$xml = simplexml_load_file("../../product_info_test.xml");
foreach($xml->children()as $aisle){
foreach($aisle-> product as $item){
    if($item->code==""){
    continue;
    }
    $code= (int)$item->code;
    $name=$item->name;
    $weight=$item->weight;
    $brand=$item->brand;
    $price=$item->price;
    $quantity=(int)$item->quantity;
    ?>


<div class=backstore-p7>
 <div class="row mt-2">
      <div class="card-body col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <img src="../../images/product_<?=$code?>.jpg" class="img-fluid " style="background-color: white;" alt="<?= $name?>">
      </div> 
      <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 align-self-center " id="productCC">
        <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h1><?=$name?></h1></div>
        <div class="card-body my-auto ">
                <div class="col-xl-8 col-lg-8 col-md-8 align-self-center">
                    <h5 class="card-title d-inline">Price: $<?= $price?></h5>
                    <h6 class="card-title">Quantity Remaining: <?= $quantity?></h6>
                    <span class="input-group-btn">
                      <button onclick="decrementNegative('amount-<?=$code?>');" class="quantity-left-minus btn btn-danger btn-number"
                          data-type="minus" data-field="">-
                      </button></span>
                  <input id='amount-<?=$code?>' size="3" type="text" value="0">
                  <span class="input-group-btn">
                  <button onclick="increment('amount-<?=$code?>');" type="button" class="quantity-right-plus btn btn-success btn-number"
                          data-type="plus" data-field="">+
</button>                </span>

       <form id="addForm" action="" method="POST" >   
        <button onclick="mySubmit('add-<?=$code?>',<?=$code?>);"class="btn btn-dark btn-md mt-2 ">Add Quantity(Cannot Add zero)</button>
        <input type="hidden" id="add-<?=$code?>" name="add-<?=$code?>" value="">
        </form>
        <script>
                    function mySubmit(name1,number) {
                        
                      try{var name='amount-'+number;
                        var val=sessionStorage[name];
                                  document.getElementById(name1).value=val;
                                 }
                                  catch(e){console.log(e.message)}
                                document.getElementById("addForm").submit();}
                                </script>

        <a href="edit_product.php?product_code=<?=$code?>" class="btn btn-dark btn-md mt-2 d-block ">Edit</a>
        <form action="" method="post">
        <button onclick="submit();"class="btn btn-danger btn-md mt-2 btn-block">Delete</button>
        <input type="hidden" name="delete" value=<?=$code?> >
</form>



            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }}?>
<?php include('footer.php'); ?>
    </body>
</html>
