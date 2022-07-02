function addStock() {
    var name = document.getElementsByClassName("name")[0].value;
    var price = document.getElementsByClassName("price")[0].value;
    var quantity = document.getElementsByClassName("quantity")[0].value;

    if (name != "" && price != "" && quantity != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                alert(response);
                document.getElementsByClassName("name")[0].value = "";
                document.getElementsByClassName("price")[0].value = "";
                document.getElementsByClassName("quantity")[0].value = "";
            }
        }
        xhr.open("GET", "../php/stock.php?name=" + name + "&price=" + price + "&quantity=" + quantity + "&addStock=true");
        xhr.send();
      
    } else {
        alert("Fill all fields");
    }
}

function editStock(id) {
    var name = document.getElementsByClassName("name")[0].value;
    var price = document.getElementsByClassName("price")[0].value;
    var quantity = document.getElementsByClassName("quantity")[0].value;

    if (name != "" && price != "" && quantity != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                alert(response);
            }
        }
        xhr.open("GET", "../php/stock.php?name=" + name + "&price=" + price + "&quantity=" + quantity + "&id=" + id + "&editStock=true");
        xhr.send();
    } else {
        alert("Fill all fields");
    }
}

function getStocks() {
    var searchKey = document.getElementById("search-field").value;
    if(searchKey == "") {
        searchKey = "none";
    }
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            //alert(response);
            document.getElementsByClassName("stocks-data")[0].innerHTML = response;
        }
    }
    xhr.open("GET", "../php/stock.php?getStocks=true&searchKey="+searchKey);
    xhr.send();
}

getStocks();
setInterval(getStocks, 1000);

function getClosingStocks() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            //alert(response);
            document.getElementsByClassName("closing-stocks-data")[0].innerHTML = response;
        }
    }
    xhr.open("GET", "../php/stock.php?getClosingStocks=true");
    xhr.send();
}


function searchClosingStocks() {

    var searchKey = document.getElementById("search-field").value;
    if (searchKey != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                //alert(response);
                document.getElementsByClassName("closing-stocks-data")[0].innerHTML = response;
            }
        }
        xhr.open("GET", "../php/stock.php?searchClosingStocks=true&searchKey=" + searchKey);
        xhr.send();
    } else {
        getClosingStocks();
    }
}

getClosingStocks();


function deleteStock(stockName) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response);
            getStocks();
        }
    }
    xhr.open("GET", "../php/stock.php?deleteStock=true&stockName=" + stockName);
    xhr.send();
}

function selectClosingStock(id) {
    //get all databoxes
    var databoxes = document.getElementsByClassName("databox");
    for (i = 0; i < databoxes.length; i++) {
        databoxes[i].style.backgroundColor = "#f3f3f3";
    }

    var selected = document.getElementsByClassName(id)[0];
    selected.style.backgroundColor = "#e495ee";
    document.getElementById("search-field").value = selected.innerHTML;

}

function increaseQuantity() {
    var quantity = Number(document.getElementsByClassName("quantity")[0].innerHTML);
    quantity = quantity + 1;
    document.getElementsByClassName("quantity")[0].innerHTML = quantity;
}

function decreaseQuantity() {
    var quantity = Number(document.getElementsByClassName("quantity")[0].innerHTML);
    if (quantity > 1) {
        quantity = quantity - 1;
        document.getElementsByClassName("quantity")[0].innerHTML = quantity;
    }
}


function sell() {

    var name = document.getElementById("search-field").value;
    var quantity= document.getElementsByClassName("quantity")[0].innerHTML;

    if (name != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                alert(response);
                if(response == "Transaction successful") {
                    window.location = "transactions.php";
                }
            }
        }
        xhr.open("GET", "../php/stock.php?name=" + name + "&quantity=" + quantity + "&sell=true");
        xhr.send();
    } else {
        alert("No medicine chosen");
    }
}