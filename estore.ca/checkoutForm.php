<body></body>

<script>
window.onload=function(){
const form = document.createElement("form");
form.setAttribute('method', "post");
form.setAttribute('action', "checkout.php");
form.setAttribute("style","display:none");
const input=document.createElement("input");
input.setAttribute("type", "text");
input.setAttribute("name","cartString");
form.appendChild(input);
document.body.appendChild(form);
var cartString="";
var countString="";
for(var i=0;i<localStorage.length;i++){
if(localStorage.key(i).includes("Button")){
    var itemCount=parseInt(localStorage.getItem(localStorage.key(i)));
    
        if(!Number.isNaN(itemCount)){
            var productName= localStorage.key(i).replace('Button', '');
            if(i != (localStorage.length)-1){cartString+=productName+" "; countString+= itemCount+" " }
            if(i == (localStorage.length)-1){cartString+=productName; countString+= itemCount}
           }
        }
}


input.setAttribute("value",cartString + "&&" + countString);
form.submit();

}</script>