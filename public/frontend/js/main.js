
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("item").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("item").innerHTML = this.responseText;
        }
        }
        xmlhttp.open("GET", "search/q="+str, true);
        xmlhttp.send();
    }
    }
function addCart(id) {
        
        var xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
            const text = this.responseText;
            const obj= JSON.parse(text);
            document.getElementById("quantity").innerHTML = obj.items_count;
        }
        }
        xmlhttp.open("GET", "addcart/c="+id, true);
     xmlhttp.send();
}
function closeCart() {
    document.getElementById('dropdown-menu').style = 'display: none;';
}
function showCart() {
    // document.getElementById("index-cart").style = "display: block;";
    // document.getElementById("index-cart").onclick(document.getElementById("index-cart").style="display: none;");
    document.getElementById('dropdown-menu').style = 'display: block;';
     var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list-cart").innerHTML = this.responseText;
    }
    }
    xmlhttp.open("GET", "showcart", true);
    xmlhttp.send();
}
function showCart() {
    // document.getElementById("index-cart").style = "display: block;";
    // document.getElementById("index-cart").onclick(document.getElementById("index-cart").style="display: none;");
    document.getElementById('dropdown-menu').style = 'display: block;';
     var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list-cart").innerHTML = this.responseText;
    }
    }
    xmlhttp.open("GET", "showcart", true);
    xmlhttp.send();
}
function removeitem(id,x) {   
    x.innerHTML = "<div class='spinner-border' style='width: 1rem; height: 1rem;'></div>";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        
    if (this.readyState == 4 && this.status == 200) {
            const text = this.responseText;
            const obj = JSON.parse(text);
        document.getElementById("quantity").innerHTML = obj.items_count;
    }
    }
    xmlhttp.open("GET", "removecart/r="+id, true);
 xmlhttp.send();
}