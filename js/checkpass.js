
function check() {
    if(document.getElementById('password').value === document.getElementById('InputPassword1').value) {
        document.getElementById('message').innerHTML = "match";
    } else {
        return confirm("Password is not same!");
        
    }
}

