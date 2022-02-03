let loginBtn = document.getElementById('login-button');
loginBtn.onclick = () => {
    login();
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
            document.getElementById("login-error").innerHTML = 'Credenziali errate.';
            setTimeout( () => {
                document.getElementById("login-error").innerHTML = '';
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
        errors.push("I campi " + voids.join(', ') + " sono obbligatori");
    }

    if (errors.length > 0) {
        displayErrors(errors, 'login-error');
        return;
    }

    loginRequest(email, password);
}