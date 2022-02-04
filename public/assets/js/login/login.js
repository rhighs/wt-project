let loginBtn = document.getElementById('login-button');

loginBtn.onclick = () => {
    login();
}

const loginRequest = (email, password) => {
    fetch('/api/login', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    }).then(async res => {
        let jsonData = await res.json();

        if(jsonData.success === false) {
            document.getElementById("login-error").innerHTML = jsonData.error;
            setTimeout(() => {
                document.getElementById("login-error").innerHTML = "";
            }, 3000);
        } else {
            localStorage.setItem("token", jsonData.token);
            window.location.href = "/account";
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
