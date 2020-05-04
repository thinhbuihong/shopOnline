function loadProduct(){
    var xhtttp = new XMLHttpRequest();
    xhtttp.open('get','getProduct.php',true);
    
    xhtttp.onreadystatechange = function(){
        if(xhtttp.readyState == 4 && xhtttp.status ==200){
            var result = xhtttp.responseText;
            document.getElementById('product').innerHTML = result;
        }
    }
    xhtttp.send();

}


