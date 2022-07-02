function getTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            //alert(response);
            document.getElementById("todaySales").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/adminStats.php?getTotal=true");
    xhr.send();
}

function getStocksTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("stockTotal").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/adminStats.php?getStocksTotal=true");
    xhr.send();
}

function getUsersTotal() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("userTotal").innerHTML = response;
        }
    }
    xhr.open("GET", "../php/adminStats.php?getUsersTotal=true");
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
    xhr.open("GET", "../php/adminStats.php?getTransactionsTotal=true");
    xhr.send();
}


function call() {
    getTotal();
    getStocksTotal();
    getTransactionsTotal();
    getUsersTotal();
}
call();
setInterval(call, 2000);