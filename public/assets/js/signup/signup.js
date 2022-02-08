const signUp = () => {
    let name = document.getElementById("signup-name").value;
    let surname = document.getElementById("signup-surname").value;
    let email = document.getElementById("signup-email").value;
    let password = document.getElementById("signup-password").value;
    let passwordConfirm = document.getElementById("signup-password-confirm").value;

    const resetFields = () => {
        document.getElementById("signup-name").value = "";
        document.getElementById("signup-surname").value = "";
        document.getElementById("signup-email").value = "";
        document.getElementById("signup-password").value = "";
        document.getElementById("signup-password-confirm").value = "";
    }

    let errors = [];
    let nullValueLabels = [];

    if (!name) {
        nullValueLabels.push("Nome");
    }
    if (!surname) {
        nullValueLabels.push("Cognome");
    }
    if (!email) {
        nullValueLabels.push("Email");
    }
    if (!password) {
        nullValueLabels.push("Password");
    }
    if (!passwordConfirm) {
        nullValueLabels.push("Conferma Password");
    }

    if (!validateEmail(email)) {
        errors.push('email non valida');
    }
    if (password !== passwordConfirm) {
        errors.push("Le due password non corrispondono");
    }

    if (nullValueLabels.length > 0) {
        errors.push("I campi " + nullValueLabels.join(", ") + " sono obbligatori");
    }

    if (errors.length > 0) {
        displayErrors(errors, 'signup-error');
        return;
    }

    fetch("/api/signup", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: name,
            surname: surname,
            email: email,
            password: password
        })
    }).then(res => {
        if (res.success === true) {
            resetFields();
            setTimeout(() => {
                window.location.href = "/login";
            }, 1000);
        } else {
            document.getElementById("signup-error").innerHTML = "Errore durante la registrazione";
            resetFields();
        }
    });
}

let button = document.getElementById("signup-button");
button.onclick = () => {
    signUp();
}