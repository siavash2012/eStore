
    window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload(); //reload page if it has been loaded from cache
    }
    }

    window.onload = function(){
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

