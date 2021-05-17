function increment(input){
    var currentAmount = null;
    var currentAmountHTML = document.getElementById(input);
    if(sessionStorage[input]){
        currentAmount = parseInt(sessionStorage.getItem(input));
    }
    else{
        currentAmount = parseInt(currentAmountHTML.value);
    }
    currentAmount = parseInt(currentAmount) + 1;
    currentAmountHTML.value = currentAmount.toString();
    sessionStorage.setItem(input, currentAmount);
}

function decrement(input){
    var currentAmount = null;
    var currentAmountHTML = document.getElementById(input);
    if(sessionStorage[input]){
        currentAmount = parseInt(sessionStorage.getItem(input));
    }
    else{
        currentAmount = parseInt(currentAmountHTML.value);
    }
    if(currentAmount >= 1){
        currentAmount = parseInt(currentAmount) - 1;
        currentAmountHTML.value = currentAmount.toString();
        sessionStorage.setItem(input, currentAmount);
    }
}


function moreDescription(){
    var description = document.getElementById("description-text")
    if(description.style.display == "none"){
        description.style.display = "block";
    }
    else{
        description.style.display = "none";
    }
}

function updateValues(){

    keys = (Object.keys(sessionStorage));
    console.log(keys);
    for(i=0; i<keys.length; i++){
        if(sessionStorage.getItem(keys[i]) != null){
            var temp = document.getElementById(keys[i]);
            if(temp){
                var itemToUpdate = document.getElementById(keys[i]);
                itemToUpdate.value = (sessionStorage.getItem(keys[i])).toString();
            }
        }
    }

}

function updateValue(input){
    console.log(input);
    console.log(sessionStorage.getItem(input));
    if(sessionStorage.getItem(input) != null){
        console.log(input);
        console.log(sessionStorage.getItem(input));
        var itemToUpdate = document.getElementById(input);
        itemToUpdate.value = (sessionStorage.getItem(input)).toString();
    }

}

function getTotal(item){
    var priceArray = document.getElementsByClassName("pricing");
    var rate = priceArray[0].innerHTML;
    rate = parseFloat(rate.slice(1, rate.indexOf("/")));

    var total = document.getElementById("totalPrice");
    var quantity = document.getElementById(item);
    if(quantity.value > 0){
        total.innerHTML = "Sub-total: $" + Math.round((quantity.value*rate) * 100) / 100;
    }
    else{
        total.innerHTML = "Sub-total: $0"
    }
}
