function check() {
    if(document.getElementById('password').value ===
            document.getElementById('InputPassword1').value) {
        document.getElementById('message').innerHTML = "match";
    } else {
        alert("Password Does Not Match");
    }
}