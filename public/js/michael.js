//   Product codes
// ================
// cookies -----> 1
// bars --------> 2
// chips -------> 3
// pretzels ----> 4
// popcorn -----> 5
// pistachios --> 6

function moreDescription() {
    var description = document.getElementsByClassName("more-description")[0];
    var button = document.getElementsByClassName("btn-more-descr")[0];
    if (description.style.display != "block") {          
        description.style.display = "block";
        button.textContent = "Less Description";
    } else {
        description.style.display = "none";
        button.textContent = "More Description";
    }
}

function plus(productCode) {
    var qty = document.getElementById("product-qty-" + productCode);
    qty.value++;

    sessionStorage.setItem("product-qty-" + productCode, qty.value.toString());
}

function minus(productCode) {
    var qty = document.getElementById("product-qty-" + productCode);
    if (qty.value <= 0) {
        qty.value = 0;
    } else {
        qty.value--;
    }

    sessionStorage.setItem("product-qty-" + productCode, qty.value.toString());
}

// DEPRECATED
// left here for completeness
function productSubtotal(price, product) {
    var qty = sessionStorage.getItem("product-qty-" + product);
    if (qty == null) {
        qty = 1;
    }
    var subtotal = qty * price;
    document.getElementById("product-subtotal-" + product).textContent = "(Subtotal: $" + subtotal.toFixed(2) + ")";
}

// Updates the displayed subtotal of products using the product price in the product_info.xml file
// Used only for +/- button clicks, not on page refresh
function updateProductSubtotal(productCode) {
    var qty = sessionStorage.getItem("product-qty-" + productCode);
    if (qty == null) {
        qty = 1;
    }

    xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "/product_info.xml", false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;

    var x = xmlDoc.getElementsByTagName("product");
    
    for (i = 0; i < x.length; i++) {
        var code = x[i].getElementsByTagName("code")[0].innerHTML;
        console.log(code)

        if (code == productCode) {
            var price = x[i].getElementsByTagName("price")[0].innerHTML;
            var subtotal = price * qty;
            document.getElementById("product-subtotal-" + code).innerHTML = "(Subtotal: $" + subtotal.toFixed(2) + ")" ;
        }
    }     
}

// Updates the JS sessionStorage variables containing the "in-aisle" quantities of products
function updateQuantities() {
    var keys = Object.keys(sessionStorage);
    for (i = 0; i < keys.length; i++) {
        var val = sessionStorage.getItem(keys[i]);
        if (val != null) {
            var element = document.getElementById(keys[i]);
            if (element != null) {
                element.value = parseInt(val);
            }
        }
    }
}

// Updates the products' name, brand, price and weight using the values in the product_info.xml file.
// Note: this function updates the displayed product subtotal only on refresh, not on +/- button clicks
function updateProductInfo() {
    xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "/product_info_test.xml", false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;

    var x = xmlDoc.getElementsByTagName("product");

    for (i = 0; i < x.length; i++) {
        var code = x[i].getElementsByTagName("code")[0].innerHTML;
        var name = x[i].getElementsByTagName("name")[0].innerHTML;
        var brand = x[i].getElementsByTagName("brand")[0].innerHTML;
        var description = x[i].getElementsByTagName("description")[0].innerHTML;
        var price = x[i].getElementsByTagName("price")[0].innerHTML;
        var weight = x[i].getElementsByTagName("weight")[0].innerHTML;

        // need this if statement in case we're on a product page and the other Id's don't exist
        if (document.getElementById("product-name-" + code) == null) {
            continue;
        } else {
            document.getElementById("product-name-" + code).innerHTML = name;
            document.getElementById("product-brand-" + code).innerHTML = brand;
            document.getElementById("product-weight-" + code).innerHTML = weight;
            document.getElementById("product-price-" + code).innerHTML = "$" + price;

            if (document.getElementById("product-page-name-" + code) != null) {
                document.getElementById("product-page-name-" + code).innerHTML = name;
            }
        }

        if (document.getElementById("product-description-" + code) != null) {
            document.getElementById("product-description-" + code).innerHTML = description;
        }

        var qty = sessionStorage.getItem("product-qty-" + code);
        if (qty == null) {
            qty = 1;
        }
        var subtotal = price * qty;
        document.getElementById("product-subtotal-" + code).innerHTML = "(Subtotal: $" + subtotal.toFixed(2) + ")" ;
    }
}