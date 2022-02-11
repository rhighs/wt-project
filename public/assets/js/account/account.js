let userId;

const loadData = (user) => {
    let userName = document.getElementById('user-name');
    let userSurname = document.getElementById('user-surname');
    let userId = document.getElementById('user-id');
    let userEmail = document.getElementById('user-email');

    userName.innerHTML = user.name;
    userSurname.innerHTML = user.surname;
    userId.innerHTML = user.id;
    userEmail.innerHTML = user.email;

    console.log(user);
}

const formCheck = () => {

    let name = document.getElementById('form-name').value;
    let surname = document.getElementById('form-surname').value;
    let email = document.getElementById('form-email').value;
    let password = document.getElementById('form-psw').value;
    let confirmPassword = document.getElementById('form-confirm-psw').value;

    let errors = []
    let voids = []

    if (!name) {
        voids.push('nome');
    }
    if (!surname) {
        voids.push('cognome');
    }
    if (!email) {
        voids.push('email');
    }
    if (!password) {
        voids.push('password');
    }
    if (!confirmPassword) {
        voids.push('password di conferma');
    }

    if (!validateEmail(email)) {
        errors.push('email non valida');
    }
    if (password != confirmPassword) {
        errors.push('le password devono essere indetiche');
    }

    if (voids.length > 0) {
        errors.push("I campi " + voids.join(', ') + " sono obbligatori");
    }

    if (errors.length > 0) {
        displayErrors(errors, 'error-list');
        return false;
    }

    return true;
}

const sendData = (data) => {
    fetch('api/account/' + userId, { 
        method: 'PATCH',
        body: JSON.stringify({
            name: data.name,
            surname: data.surname,
            email: data.email,
            password: data.password
        })
    });
}

let modifyDataButton = document.getElementById('modifyCredentials');
modifyDataButton.addEventListener("click", () => {
    document.getElementById('modifyForm').style.display = "block";
});

let closeFormButton = document.getElementById('closeButton');
closeFormButton.addEventListener('click', () => {
    document.getElementById("modifyForm").style.display = "none";
});

let saveFormButton = document.getElementById('save-button');
    saveFormButton.addEventListener('click', () => {
    let check = formCheck();
    if (check == false) { return; }

    let name = document.getElementById('form-name').value;
    let surname = document.getElementById('form-surname').value;
    let email = document.getElementById('form-email').value;
    let password = document.getElementById('form-psw').value;
    
    let data = {
        name: name,
        surname: surname,
        email: email,
        password: password
    }
    sendData(data);
});

redirectIfNotAuthenticated();
testAuth()
    .then(user => {

        userId = user.id;
        loadData(user);

        fetch("/api/transaction/" + user.id, {
            method: "POST"
        }).then(async result => {
            let jsonData = await result.json();
            console.log(jsonData);
            // Display transactions...
        });
    });