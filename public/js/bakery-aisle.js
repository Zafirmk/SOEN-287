//Updates the values of inputs displayed on the webpage by the values stored in the sesionStorage
function updateValues(){
  keyList = (Object.keys(sessionStorage));
  console.log(keyList);

  for (var i = 0; i < keyList.length; i++) {
    if(keyList[i]!=null && document.getElementById(keyList[i])){
      //Fetches the elemnt to be updated
      var elementToUpdate = document.getElementById(keyList[i]);
      //Updates the value displayed by the document to the value stored in the sessionStorage
       elementToUpdate.value = sessionStorage.getItem(keyList[i]);
    }
  }
}

function increment(elementID){
  var element = document.getElementById(elementID);
  var amount;
  if(sessionStorage[elementID]){
     amount = parseInt(sessionStorage.getItem(elementID));
  }
  else{
   amount = parseInt(element.value);
  sessionStorage.setItem(elementID, amount.toString());
  }
  //console.log("amount:" + amount);
  //Verify for the maximum number of items per order
  if(amount <99){
    ++amount;
    element.value = (amount).toString();
    sessionStorage.setItem(elementID, amount.toString());
  }
}

function decrement(elementID){
  var element = document.getElementById(elementID);
  var amount;

  if(sessionStorage[elementID]){
     amount = parseInt(sessionStorage.getItem(elementID))
  }
  else{
    amount = parseInt(element.value);
  }
  //console.log("amount:" + amount);
//Verify for the minimum number of items per order
  if(amount >1){
    --amount;
    element.value = (amount).toString();
    sessionStorage.setItem(elementID, amount.toString());
  }
}

function showDescription(){
  var description = document.getElementById("descriptionText");
  if(description.style.display == "none"){
    description.style.display = "block" ;

  }
  else{
    description.style.display = "none";
  }
}
