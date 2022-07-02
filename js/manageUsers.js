function addUser() {
    var name = document.getElementById("name").value;
    var userType = document.getElementById("dropdown").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response);
        }
    }
    xhr.open("GET", "../php/manageUsers.php?name="+name+"&userType="+userType+"&addUser=true");
    xhr.send();
}

function removeUser(name, userType) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response);
            window.location = "manageUsers.php";
        }
    }
    xhr.open("GET", "../php/manageUsers.php?name="+name+"&userType="+userType+"&deleteUser=true");
    xhr.send();
}