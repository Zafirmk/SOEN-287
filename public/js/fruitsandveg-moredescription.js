function displayText(){
    var text = document.getElementById("description-text");
    if(text.style.display == "none"){
        text.style.display = "block";
    }
    else{
        text.style.display = "none";
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


function updateValue(input){


    console.log(input);
    console.log(sessionStorage.getItem(input));
    
    if(sessionStorage.getItem(input) != null){
        console.log(input);
        console.log(sessionStorage.getItem(input));

        var itemToUpdate = document.getElementById(input);
        itemToUpdate.value = (sessionStorage.getItem(input)).toString();
        getTotal(input);
    }
}

