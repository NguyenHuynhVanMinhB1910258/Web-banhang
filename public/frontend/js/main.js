
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
            document.getElementById("quantity").innerHTML = this.responseText;
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
 
    
    var xmlhttp = new XMLHttpRequest();
    document.getElementById('dropdown-menu').style = 'display: block;';
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list-cart").innerHTML = this.responseText;
    }
    }
    xmlhttp.open("GET", "showcart", true);
    xmlhttp.send();
}
function removeitem(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("quantity").innerHTML = this.responseText;
    }
    }
    xmlhttp.open("GET", "removecart/r="+id, true);
 xmlhttp.send();
}