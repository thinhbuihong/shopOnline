let showProduct = (category="all")=>{
    var xhtttp = new XMLHttpRequest();
    xhtttp.open('get','getProduct.php?cate='+category,true);
    
    xhtttp.onreadystatechange = function(){
        if(xhtttp.readyState == 4 && xhtttp.status ==200){
            var result = xhtttp.responseText;
            document.getElementById('product').innerHTML = result;
        }
    }
    xhtttp.send();

}

let management = (par)=>{
    var xhtttp = new XMLHttpRequest();
    xhtttp.open('get','management.php?par='+par,true);
    
    xhtttp.onreadystatechange = function(){
        if(xhtttp.readyState == 4 && xhtttp.status ==200){
            var result = xhtttp.responseText;
            document.getElementById('management').innerHTML = result;
        }
    }
    xhtttp.send();

}


