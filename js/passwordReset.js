function changePassword() {
    var old_password = document.getElementById("old").value;
    var new_password = document.getElementById("new").value;

    if (old_password != "" && new_password != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                alert(response);
            }
        }
        xhr.open("GET", "../php/passwordReset.php?old_password=" + old_password + "&new_password=" + new_password);
        xhr.send();
    } else {
        alert("Fill all fields");
    }

}