let loginBtn = document.getElementById('login-button');
loginBtn.onclick = () => {
    login();
}

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
}
const displayErrors = (errorList) => {
    let errorString = "";

    for (let error of errorList) {
        errorString += "- " + error + ".<br>";
    }

    document.getElementById("login-error").innerHTML = errorString;
    setTimeout(() => {
        document.getElementById("login-error").innerHTML = "";
    }, 4000 * errorList.length);
}
const loginRequest = (email, password) => {
    fetch('/login', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    }).then( res => {
        if(res.status !== 200) {
            setTimeout( () => {
                document.getElementById("login-error").innerHTML = "Credenziali errate.";
            }, 3000);
        }
    });
}
const login = () => {
    let email = document.getElementById('login-email').value;
    let password = document.getElementById('login-password').value;

    let errors = []
    let voids = []
    if (!email) {
        voids.push('inserisci email');
    }
    if (!password) {
        voids.push('inserisci password');
    }
    if (!validateEmail(email)) {
        errors.push('email non valida');
    }
    if (voids.length > 0) {
        errors.push('I campi ' + voids.join(', ') + ' sono obbligatori');
    }

    if (errors.length > 0) {
        displayErrors(errors);
        return;
    }

    loginRequest(email, password);
}