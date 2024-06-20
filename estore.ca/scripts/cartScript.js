window.onload = function(){
    document.getElementById("checkoutButton").addEventListener("click",checkout,false);     
    document.getElementById("removeAll").addEventListener("click",removeAll,false);
    var removeButtons = document.getElementsByClassName("remove");
    for(var i=0;i<removeButtons.length;i++){
        removeButtons[i].addEventListener("click",removeItem,false);
    }
    var plusButtons = document.getElementsByClassName("btnPlus");
    for(var i=0;i<plusButtons.length;i++){
        plusButtons[i].addEventListener("click",plusItem,false);
    }
    var minusButtons = document.getElementsByClassName("btnMinus");
    for(var i=0;i<minusButtons.length;i++){
        minusButtons[i].addEventListener("click",minusItem,false);
    }
    updateQuantities();
    calculateTotal();
    
    
    document.getElementById("search-button").addEventListener("click",searchClick,false);
    document.getElementById("search-form").addEventListener("submit", function(e) {
        e.preventDefault();
        searchClick();
        return false;
    });
    
    var addToCartButtons = document.querySelectorAll(".addToCart");
    if(addToCartButtons.length>0){
        for(var i=0; i< addToCartButtons.length; i++){
	        var buttonName=addToCartButtons[i].id;
            addToCartButtons[i].addEventListener("click",addToCart,false);
        }
    }
    checkButtons();
}


function removeAll(){
    var counts = document.getElementsByClassName("count");    
    for(var i=0;i<counts.length;i++){
       var countName=counts[i].className;
       var itemName=counts[i].className.replace('count ','');
       var localStorageKey=itemName+"Button";
       localStorage.removeItem(localStorageKey);
    }
    window.location.replace("cartForm.php");
}

function removeItem(){
    var removeItemKey = (this.className);
    var itemKey= removeItemKey.replace('remove ', '')+"Button";
    localStorage.removeItem(itemKey);
    window.location.replace("cartForm.php");
}

function updateQuantities(){
    var counts = document.getElementsByClassName("count");
    for(var i=0;i<counts.length;i++){
       var countName=counts[i].className;
       var name=counts[i].className.replace('count ','');
       var key=name+"Button";
       counts[i].innerHTML=localStorage.getItem(key);
   }
    
}



function calculateTotal(){
    var subTotal=0;
    var totalItems=0;
    var counts = document.getElementsByClassName("count");
   for(var i=0;i<counts.length;i++){
       var countName=counts[i].className;
       var itemName=counts[i].className.replace('count ','');
       var amountClassName=("amount "+itemName);
       var itemPrice=parseInt(document.getElementsByClassName(amountClassName)[0].innerHTML);
       var itemQuantity=parseInt(counts[i].innerHTML);
       if(!isNaN(itemPrice) && !isNaN(itemPrice)){
            var price=itemPrice * itemQuantity;
            subTotal +=price;
            totalItems+=itemQuantity;
            var key=itemName+"Button";
            localStorage.setItem(key,itemQuantity);
       }
   }
    document.getElementsByClassName("totalAmount")[0].innerHTML="$"+subTotal.toString();
    document.getElementsByClassName("items")[0].innerHTML=totalItems.toString()+" items";

}

function plusItem(){
    var btnbtnPlusClassName = (this.className);
    var className= btnbtnPlusClassName.replace('btn btnPlus ', '');
    var counts=document.getElementsByClassName("count "+className);
    var target=counts[0];
    var previousCount=parseInt(target.innerHTML);
    var newCount = previousCount +=1;
    target.innerHTML=newCount;
    calculateTotal();
    
}

function minusItem(){
    var btnbtnMinusClassName = (this.className);
    var className= btnbtnMinusClassName.replace('btn btnMinus ', '');
    var counts=document.getElementsByClassName("count "+className);
    var target=counts[0];
    var previousCount=parseInt(target.innerHTML);
    var newCount = previousCount -=1;
    if(newCount>=0){
        target.innerHTML=newCount;
    }
    calculateTotal();
    
}

function checkout(){
    window.location.href = "checkoutForm.php";
}

function addToCart(){
var productNameButton=this.id;
localStorage.setItem(productNameButton, '1');
this.value="Already in Cart";
this.disabled = true;
}

function searchClick() {
    var str= document.getElementById("search-box").value + "&c=" + document.getElementById("categories").value;
  if (document.getElementById("search-box").value == "") {
      document.getElementById("queryResult").innerHTML="";
    return;
  } else {
      
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         
          if(this.responseText==""){document.getElementById("queryResult").innerHTML=("<p style='font-weight:bold; font-size:20px;'>Your search<span style='color:red;'> "+document.getElementById("search-box").value+"</span> did not match any products.</p>");
              
          }else{
          document.getElementById("queryResult").innerHTML=(this.responseText);
          }
          checkButtons();
      }
      
    };
    xmlhttp.open("GET", "navsearch.php?q=" + str, true);
    xmlhttp.send();
  }
}


function addToCartFromSearch(button){
    var productNameButton=button.id.replace("Search", "");
    localStorage.setItem(productNameButton, '1');
    button.value="Already in Cart";
    button.disabled = true;
}

function checkButtons(){
    var addToCartButtons = document.querySelectorAll(".addToCart");
    if(addToCartButtons.length>0){
        for(var i=0; i< addToCartButtons.length; i++){
	    var buttonName=addToCartButtons[i].id;
        var itemCount=parseInt(localStorage.getItem(buttonName.replace("Search","")));
	    if (!Number.isNaN(itemCount)) {
	    addToCartButtons[i].value="Already in Cart";
	    addToCartButtons[i].disabled = true;
	    }
    }
}
}
