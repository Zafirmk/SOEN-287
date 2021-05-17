<?php
if(isset($_GET['amount-13']))
{ 
echo $_GET['amount-13'];
}
//     $xml = simplexml_load_file("C:\Users\cpang\Desktop\SOEN-287-main\product_info copy.xml");

// foreach($xml->meat_poultry_fish_aisle->product as $item){
//     if ($item->code==$numba) {
//         unset($item->item);
//         unset($xml->item);
//         unset($item->code);
//         unset($item->name);
//         unset($item->weight);
//         unset($item->brand);
//         unset($item->price);
//         unset($item->description);
//         unset($item->description2);
//         unset($item->quantity);

// 	break;
//     echo "-----------------------------------------";
// 		}
// }
// file_put_contents("C:\Users\cpang\Desktop\SOEN-287-main\product_info copy.xml",$xml->saveXML());}
?>
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
<html>
<body>

<div class="col-lg-12 incDecButton">
                                <span class="input-group-btn">
                                    <button onclick="decrement('amount-13');" type="button" class="quantity-left-minus btn btn-danger btn-number"
                                        data-type="minus" data-field="">-
                                    </button>
                                </span>
        
                                <input id='amount-13' size="3" type="number" value="1">
                                
                                    <span class="input-group-btn">
                                        <button onclick="increment('amount-13')"; type="button" class="quantity-right-plus btn btn-success btn-number"
                                        data-type="plus" data-field="">+
                                        </button>
                                    </span>
                            </div>

<div class="col-lg-12 addToCart mt-6"> 
<form id="myForm" action="" method="get">
    <button onclick="mySubmit('hello');"class="btn btn-info">Add to cart</button>
    <input type="hidden" id="hello" name="amount-13" value="">
    </form>

<script> 
  function mySubmit(name1) {
     document.getElementById(name1).value = "Deez";
     document.getElementById("myForm").submit();
   }
</script>
</script>
    <?php
if(isset($_POST['amount-13']))
{ 
   $SESSION=$_POST['amount-13'];
echo $_POST['amount-13'];
}
?>
</div>
</form>

</body>
</html>