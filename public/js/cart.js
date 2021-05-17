
var products = [

  {
    name: 'Royal Gala Apples',
    amount: 0,
    price: 2.99
  },

  {
    name: 'Pictsweet Farms Broccoli',
    amount: 0,
    price: 2.99
  },

  {
    name: 'Burnbrae White Eggs',
    amount: 0,
    price: 3.50
  },

  {
    name: 'Nature Valley Bars',
    amount: 0,
    price: 4.5
  }

]

/*function subtotal(cartadd) {

document.getElementById("cartadd")
console.log(document.getElementById("cartadd"));
console.log('Hello World');

  for (i=0; i<keys.length; i++) {
  console.log(sessionStorage.getItem(keys[i]));
  }
}*/

function getPrices() {

  var subtotal = 0;
  for (var i = 0; i<products.length; i++) {
    console.log(sessionStorage.getItem(keys[i]) + " " + products[i].price + " = " + sessionStorage.getItem(keys[i]) * products[i].price);
    subtotal += (sessionStorage.getItem(keys[i]) * products[i].price);
  }


  if (subtotal > 0){
    document.getElementById("subTotal").innerHTML = Math.round(subtotal * 100) / 100 + "$";
  }

  else {
      document.getElementById("subTotal").innerHTML = "0.00$"
  }
  console.log(subtotal);
  localStorage.setItem('subTotal', subtotal);

  var qst = Math.round(subtotal * 10) / 100
  document.getElementById("qstPrice").innerHTML = qst + "$";

  var gst = Math.round(subtotal * 5) / 100
  document.getElementById("gstPrice").innerHTML = gst + "$";

  var shipping = 20.00;
  document.getElementById("shippingPrice").innerHTML = shipping + ".00$";

  var finalPrice = subtotal + qst + gst + shipping;
  document.getElementById("finalPrice").innerHTML = Math.round(finalPrice * 100) / 100 + "$";
}

console.log(localStorage.getItem('subTotal'));
