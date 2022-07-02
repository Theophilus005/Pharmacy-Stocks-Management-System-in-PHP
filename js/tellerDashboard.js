function getTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            //alert(response);
            document.getElementById("todaySales").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/tellerStats.php?getTotal=true");
    xhr.send();
}

function getOpeningStocksTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("openingTotal").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/tellerStats.php?getOpeningStocksTotal=true");
    xhr.send();
}

function getClosingStocksTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("closingTotal").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/tellerStats.php?getClosingStocksTotal=true");
    xhr.send();
}


function getTransactionsTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("transToday").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/tellerStats.php?getTransactionsTotal=true");
    xhr.send();
}


function call() {
    getTotal();
    getOpeningStocksTotal();
    getClosingStocksTotal();
    getTransactionsTotal();
}

call();
setInterval(call, 2000);