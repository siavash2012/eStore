<body></body>

<script>
window.onload=function(){
const form = document.createElement("form");
form.setAttribute('method', "post");
form.setAttribute('action', "cart.php");
form.setAttribute("style","display:none");
const input=document.createElement("input");
input.setAttribute("type", "text");
input.setAttribute("name","cartString");
form.appendChild(input);
document.body.appendChild(form);
var cartString="";
for(var i=0;i<localStorage.length;i++){
if(localStorage.key(i).includes("Button")){
    var itemCount=parseInt(localStorage.getItem(localStorage.key(i)));
    
        if(!Number.isNaN(itemCount)){
            var productName= localStorage.key(i).replace('Button', '');
            if(i != (localStorage.length)-1){cartString+=productName+" ";}
            if(i == (localStorage.length)-1){cartString+=productName;}
           }
        }
}


input.setAttribute("value",cartString);
form.submit();

}</script>