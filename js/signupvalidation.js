const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const conpass = document.getElementById('conpass');

document.querySelector("button").addEventListener("click", (event) => {
    event.preventDefault();

    checkInputs();
});

function checkInputs() {
    const usernameValue = username.querySelector("input").value.trim();
    const emailValue = email.querySelector("input").value.trim();
    const passwordValue = password.querySelector("input").value.trim();
    const conpassValue = conpass.querySelector("input").value.trim();


    if (usernameValue === '') {
        setErrorFor(username, "Username cannot be blank");
    } else {
        setSuccessFor(username);
    }
    
    if (emailValue === '') {
        setErrorFor(email, "Email cannot be blank");
    } else {
        setSuccessFor(email);
    }

    if (passwordValue === '') {
        setErrorFor(password, "Password cannot be blank");
    } else {
        setSuccessFor(password);
    }

    if (conpassValue === '') {
        setErrorFor(conpass, "Please confirm your password");
    } else {
        setSuccessFor(conpass);
    }

    if(usernameValue !== '' && emailValue !== '' && passwordValue !== '' && conpassValue !== '' && conpassValue === passwordValue){
        var phpfile = ('config/reg-valid.php');
        
        $.post(phpfile, {signup: usernameValue, email: emailValue}, function(data) {

            if (data == "0") {
                document.getElementById('form').submit();
            } 
            if (data == "1") {
                setErrorFor(username, "Username is not available");
                setErrorFor(email, "Email is already taken");
            } 
            if (data == "2") {
                setErrorFor(username, "Username is not available");
            }
            if (data == "3") {
                setErrorFor(email, "Email is already taken");
            }

    });
    }
    
    if (passwordValue !== conpassValue) {
        setErrorFor(password, "Please confirm your password");
        setErrorFor(conpass, "Please confirm your password");
    }
}



function setErrorFor(input, message) {
    input.querySelector("input").style.borderColor = "red";
    input.querySelector("small").innerText = message;
    input.querySelector("small").style.visibility = "visible";
}

function setSuccessFor(input) {
    input.querySelector("input").style.borderColor = "green";
    input.querySelector("small").style.visibility = "hidden";
}



