var itemKeys=[];
for(var i=0;i<localStorage.length;i++){
       var keyName = localStorage.key(i);
       if(keyName.includes('Button')){
       itemKeys[i]=keyName;
       }
    }

for(var i=0;i<itemKeys.length;i++){
       localStorage.removeItem(itemKeys[i]);
    }