function showPasswordUser() {
    var x = document.getElementById("password-user");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";}
}

function showPassword() {
    var x = document.getElementById("password-lama");
    var y = document.getElementById("password-baru");
    if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
    } else {
    x.type = "password";
    y.type = "password"; }
}
