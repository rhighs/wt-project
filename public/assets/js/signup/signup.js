const displayErrors = (errorList) => {
    let errorString = "";

    for (let error of errorList) {
        errorString += "- " + error + ".<br>";
    }

    document.getElementById("signup-error").innerHTML = errorString;
    setTimeout(() => {
        document.getElementById("signup-error").innerHTML = "";
    }, 4000 * errorList.length);
}

const signUp = () => {
    let name = document.getElementById("signup-name").value;
    let surname = document.getElementById("signup-surname").value;
    let email = document.getElementById("signup-email").value;
    let password = document.getElementById("signup-password").value;
    let passwordConfirm = document.getElementById("signup-password-confirm").value;

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

    if (password !== passwordConfirm) {
        errors.push("Le due password non corrispondono");
    }

    if (nullValueLabels.length > 0) {
        errors.push("I campi " + nullValueLabels.join(", ") + " sono obbligatori");
    }

    if (errors.length > 0) {
        displayErrors(errors);
        return;
    }

    fetch("/signup", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: name,
            surname: surname,
            email: email,
            password: password,
            passwordConfirm: passwordConfirm
        })
    }).then(res => {
        if (res.status !== 200) {
            //document.getElementById("signup-error").innerHTML = "Errore durante la registrazione";
        }
    });
}

let button = document.getElementById("signup-button");
button.onclick = () => {
    signUp();
}