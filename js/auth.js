function login(authType) {
    var username = document.getElementsByClassName("name-field")[0].value;
    var password = document.getElementsByClassName("password-field")[0].value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if(response == "success") {
                if(authType == "Admin") {
                window.location = "adminDashboard.php"; 
                } else {
                    window.location = "tellerDashboard.php";
                }
            } else {
                alert(response);
            }
        }
    }
    xhr.open("GET", "../php/auth.php?username="+username+"&password="+password+"&authType="+authType);
    xhr.send(); 
}