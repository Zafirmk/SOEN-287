function increment(input) {

    var curr_amount = null;
    var curr_amount_html = document.getElementById(input);

    if(sessionStorage[input]){
        curr_amount = parseInt(sessionStorage.getItem(input));
    }
    else{
        curr_amount = parseInt(curr_amount_html.value);
    }

    curr_amount = parseInt(curr_amount) + 1;
    curr_amount_html.value = curr_amount.toString();
    sessionStorage.setItem(input, curr_amount);

}

function decrement(input) {

    var curr_amount = null;
    var curr_amount_html = document.getElementById(input);

    if(sessionStorage[input]){
        curr_amount = parseInt(sessionStorage.getItem(input));
    }
    else{
        curr_amount = parseInt(curr_amount_html.value);
    }

    if(curr_amount > 1){
        curr_amount = parseInt(curr_amount) - 1;
        curr_amount_html.value = curr_amount.toString();
        sessionStorage.setItem(input, curr_amount);
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
