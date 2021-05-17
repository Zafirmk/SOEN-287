function ShowDescription(){
var description = document.getElementById("description2")
if(description.style.display === "none"){
    description.style.display = "block";}
else{
    description.style.display="none";
}
}


function increment(amount) {

    if(sessionStorage[amount]){
    var setAmount=parseInt(sessionStorage.getItem(amount));
    }
     else{
      var setAmount=parseInt(document.getElementById(amount).value);
     }

    setAmount++;
    document.getElementById(amount).value = setAmount;
    sessionStorage.setItem(amount, setAmount);

}


function decrement(amount) {

    if(sessionStorage[amount]){
        setAmount=parseInt(sessionStorage.getItem(amount));
        }
        else{
         setAmount=parseInt(document.getElementById(amount).value);
        }
    
    if(setAmount > 1){
        setAmount--; 
        document.getElementById(amount).value = setAmount;
        sessionStorage.setItem(amount, setAmount);
    }

}

function decrementNegative(amount) {

    if(sessionStorage[amount]){
        setAmount=parseInt(sessionStorage.getItem(amount));
        }
        else{
         setAmount=parseInt(document.getElementById(amount).value);
        }
    
        setAmount--; 
        document.getElementById(amount).value = setAmount;
        sessionStorage.setItem(amount, setAmount);

}

function updateValue(amount){
    if(sessionStorage.getItem(amount) != null){
        var itemToUpdate = document.getElementById(amount);
        itemToUpdate.value = (sessionStorage.getItem(amount)).toString();

    totalprice(amount);
    }
}


function updateAllValues(){
         keys = Object.keys(sessionStorage);
        for (i = 0; i < keys.length; i++) {
            if (sessionStorage.getItem(keys[i])!= null) {
                if ( document.getElementById(keys[i])!= null) {
                    document.getElementById(keys[i]).value = parseInt(sessionStorage.getItem(keys[i]));
                }
            }
        }
    }



function totalprice(amount){

    var products = document.getElementsByClassName("pricing")[0].innerHTML;
    cost = parseFloat(products.slice(0,-3));
    var total = document.getElementById("totalPrice");
    var quantity = document.getElementById(amount);

    if(sessionStorage.getItem(amount)===null){
    total.innerHTML="Sub total: $"+Math.round((quantity.value*cost + Number.EPSILON) * 100) / 100;
    }
 else{
    total.innerHTML="Sub:total $"+Math.round((quantity.value*cost + Number.EPSILON) * 100) / 100;
 }
}
