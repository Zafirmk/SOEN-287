
<?php
session_start();
$product_code = 1;
$subtotal = 0;
$qst = ($subtotal * 0.1);
$gst;
$shipping;
$final;
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>McJawz | Shopping Cart </title>

     <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
     <link rel="stylesheet" href="../../public/css/cart.css">
     <link rel="stylesheet" href="../../public/css/bootstrap.css">
     <link rel="stylesheet" href="../../public/css/cartnew.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
     <script src = "../js/dairyandeggs-aisle.js"></script>
     <script src = "../js/cart.js"></script>
 </head>

 <body onload = 'setValues()'>

   <!-- Header -->

   <?php include('header.php'); ?>

   <!-- Subheader -->
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12 title">
               <h2>Shopping Cart</h2>
           </div>
       </div>

       <div class="row">
         <div class="col-lg-6 aisles">
               <a href="../php/bakery_aisle.php">Bakery</a>
               |
               <a href="../php/beverage-aisle.php">Beverages</a>
               |
               <a href="../php/dairyandeggs-aisle.php">Dairy & Eggs</a>
               |
               <a href="../php/fruitsandveg-aisle.php">Fruits & Vegetables</a>
               |
               <a href="../php/poultry-aisle.php">Meat, Poultry & Fish</a>
               |
               <a href="../php/snack_aisle.php">Snacks</a>
 </div>

           <div class="col-lg-6 col-md-12 myCartContainer">
               <img class="shoppingcarticon" src="../../images/shoppingcarticon.png" alt="">
               <a href="../../public/html/cart.html">
                   <p>My Cart</p>
               </a>
           </div>
       </div>
   </div>

   <!-- Items in cart -->

     <div class="cartitems">
       <div class="container-fluid">
         <?php for($i=1; $i<100; $i++){

           if (isset($_SESSION["product-qty-cart-" . $product_code])) {
             $products = simplexml_load_file("../../product_info_test.xml");
             foreach ($products->snacks_aisle->product as $product) {
               if ($product_code == $product->code) {
                 $name = $product->name;
                 $price = $product->price;
               }
             }
             ?>

         <div class="card">
           <div class="col-4 images">
             <img src="../../images/product_<?=$product_code?>.jpg" alt="<?php echo $name ?>" class="img-thumbnail">
           </div>
           <div class="d-flex justify-content-center">
              <p><?php echo $name ?></p>
           </div>
           <div class="itembuttons">
             <div class="btn-group" role="group" aria-label="Basic example">

               <button onclick="decrement('cart-add1')" type="button" class="btn btn-outline-danger">-</button>
                 <input id = "cart-<?php $i ?>" class="numberinput" type="number" value="<?php echo $_SESSION["product-qty-cart-" . $product_code] ?>" min="0">
               <button onclick="increment('cart-add1')" type="button" class="btn btn-outline-success">+</button>
             </div>
               <button onclick="location.reload();" type="button" class="btn btn-outline-danger removebutt">Remove</button>
           </div>
         </div>
         <?php
         $subtotal += ($_SESSION["product-qty-cart-" . $product_code] * $price)

          ?>
       <?php

       $product_code++; } ?>
     <?php } ?>
         <div class="card">
           <div class="col-4 images">
             <img src="../../images/broccoli.jpg" alt="Broccoli" class="img-thumbnail">
           </div>
           <div class="d-flex justify-content-center">
             <p>Pictsweet Farms Broccoli</p>
           </div>
           <div class="itembuttons">
             <div class="btn-group" role="group" aria-label="Basic example">
               <button onclick="decrement('cart-add2')" type="button" class="btn btn-outline-danger">-</button>
                 <input id = "cart-add2" class="numberinput" class="numberinput" type="number" value="0" min="0">
               <button onclick="increment('cart-add2')" type="button" class="btn btn-outline-success">+</button>
             </div>
             <button type="button" class="btn btn-outline-danger removebutt">Remove</button>
           </div>
         </div>

         <div class="card">
           <div class="col-4 images">
             <img src="../../images/burnbrae_whiteeggs.jpg" alt="White Eggs" class="img-thumbnail">
           </div>
           <div class="d-flex justify-content-center">
             <p>Burnbrae White Eggs</p>
           </div>
           <div class="itembuttons">
             <div class="btn-group" role="group" aria-label="Basic example">
               <button onclick="decrement('cart-add3')" type="button" class="btn btn-outline-danger">-</button>
                 <input id = "cart-add3" class="numberinput" class="numberinput" type="number" value="0" min="0">
               <button onclick="increment('cart-add3')" type="button" class="btn btn-outline-success">+</button>
             </div>
             <button type="button" class="btn btn-outline-danger removebutt">Remove</button>
           </div>
         </div>

         <div class="card">
           <div class="col-4 images">
             <img src="../../images/bars.jpg" alt="Nature Valley Bars" class="img-thumbnail">
           </div>
           <div class="d-flex justify-content-center">
             <p>Nature Valley Bars</p>
           </div>
           <div class="itembuttons">
             <div class="btn-group" role="group" aria-label="Basic example">
               <button onclick="decrement('cart-add4')" type="button" class="btn btn-outline-danger">-</button>
                 <input id = "cart-add4" class="numberinput" class="numberinput" type="number" value="0" min="0">
               <button onclick="increment('cart-add4')" type="button" class="btn btn-outline-success">+</button>
             </div>
             <button type="button" class="btn btn-outline-danger removebutt">Remove</button>
           </div>
         </div>
       </div>
     </div>

   <!-- Total Price -->

     <section class="pricebox">
       <div class="container-fluid">
         <div class="row">
           <div class="col-6">
             <h6>Subtotal: </h6>
           </div>

           <div class="col-6">
             <!-- <h6 id = "subTotal">0.00$</h6> -->
             <h6> <?php echo round($subtotal, 2) ?>$ </h6>
           </div>
         </div>

         <div class="row">
           <div class="col-6">
             <h6>QST: </h6>
           </div>

           <div class="col-6">
             <h6><?php
             $qst = round($subtotal * 0.1, 2);
             echo $qst; ?>$ </h6>
             <!-- <h6 id = "qstPrice">0.00$</h6> -->
           </div>
         </div>

         <div class="row">
           <div class="col-6">
             <h6>GST: </h6>
           </div>

           <div class="col-6">
             <h6><?php
             $gst = round($subtotal * 0.05, 2);
             echo $gst; ?>$</h6>
             <!-- <h6 id = "gstPrice">0.00$</h6> -->
           </div>
         </div>

         <div class="row">
           <div class="col-6">
             <h6>Shipping: </h6>
           </div>

           <div class="col-6">
             <h6><?php
             $shipping = 19.99;
             echo $shipping;?>$ </h6>
             <!-- <h6 id = "shippingPrice">0.00$</h6> -->
           </div>
         </div>

         <div class="row">
           <div class="col-6">
             <h6>Estimated Total: </h6>
           </div>

           <div class="col-6">
             <h6><?php
             $final = $subtotal + $qst + $gst + $shipping;
             echo $final;
              ?>$ </h6>
             <!-- <h6 id = "finalPrice">0.00$</h6> -->
           </div>
         </div>

         <div class="row">
           <div class="col-6 nicebuttons">
             <a href="index.html">
               <div class="btn btn-primary btn-sm">Continue Shopping</div>
             </a>
           </div>
           <div class="col-6 nicebuttons">
             <button onclick="getPrices()" type="button" class="btn btn-success btn-sm">Proceed to Checkout</button>
           </div>
         </div>
       </div>
     </section>

   <!-- More items -->
     <div class="moreitems">
       <div class="container-fluid">
         <div class="row">
           <div class="col-12">
             <!-- <p>More items</p> -->
           </div>
         </div>
       </div>
     </div>

     <!-- Footer -->
     <?php include('footer.php'); ?>

   </body>
 </html>
