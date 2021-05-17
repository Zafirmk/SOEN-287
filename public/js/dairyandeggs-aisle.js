function increment(amount) {

  var i = document.getElementById(amount).value;
  i++;
  document.getElementById(amount).value = i;
  sessionStorage.setItem(amount, i);

}

function decrement(amount) {

  var i = document.getElementById(amount).value;

  if (i > 0){

    i--;
    document.getElementById(amount).value = i;
    sessionStorage.setItem(amount, i);
  }

}

function setValues(){

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

function showDescription(){

  var description = document.getElementById("description")
  if(description.style.display === "none"){
    description.style.display = "block";}
    else{
      description.style.display="none";
    }
  }
