let userId;
let transactionsNumber = 0;
let imgLink = undefined;

const loadData = (user) => {
    let userName = document.getElementById('user-name');
    let userSurname = document.getElementById('user-surname');
    let userId = document.getElementById('user-id');
    let userEmail = document.getElementById('user-email');

    userName.innerHTML = user.name;
    userSurname.innerHTML = user.surname;
    userId.innerHTML = user.id;
    userEmail.innerHTML = user.email;
}

const updateData = () => {
    testAuth()
        .then(user => {
            userId = user.id;
            loadData(user);
        });
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

const clearForm = () => {
    document.getElementById('form-name').value = "";
    document.getElementById('form-surname').value = "";
    document.getElementById('form-email').value = "";
    document.getElementById('form-psw').value = "";
    document.getElementById('form-confirm-psw').value = "";
}

const sendData = (data) => {
    fetch('/api/account/' + userId, { 
        method: 'POST',
        body: JSON.stringify({
            name: data.name,
            surname: data.surname,
            email: data.email,
            password: data.password
        })
    }).then(async result => {
        let jsonData = await result.json();
        jsonData.success ? console.log("ok") : console.log(jsonData.error);
        // Display transactions...
    });

    document.getElementById("modifyForm").style.display = "none";
}

const getCards = () => {
    fetch('api/card/' + userId, {
        method: "POST"
    });
}

const addTransaction = (t) => {
    transactionsNumber++;
    let row = document.getElementsByClassName('copyRow')[0].cloneNode(true);

    row.classList.remove('copyRow');
    row.querySelector('#transaction-id').innerHTML = transactionsNumber; 
    row.querySelector('#transaction-num').innerHTML = t.id;
    row.querySelector('#transaction-price').innerHTML = t.price + "€";
    row.querySelector('#transaction-data').innerHTML = t.timestamp;
    row.querySelector('#transaction-card').innerHTML = t.cardnumber;

    row.querySelectorAll("span").forEach(element => element.setAttribute("id", ""));
    row.querySelectorAll("button").forEach(element => element.setAttribute("id", ""));

    document.getElementById('transaction-container').appendChild(row);
}

let modifyDataButton = document.getElementById('modifyCredentials');
modifyDataButton.addEventListener("click", () => {
    document.getElementById('modifyForm').style.display = "block";
});

let closeFormButton = document.getElementById('closeButton');
closeFormButton.addEventListener('click', () => {
    document.getElementById("modifyForm").style.display = "none";
    clearForm();
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
    clearForm();
    updateData();
    simpleNotify.notify("Modifiche effettuate con successo", undefined);
});

const setCards = () => {
    fetch("/api/card/" + userId, {
        method: "POST"
    }).then(async res => {
        let jsonData = await res.json();

        let templateCard = document.getElementById("cardcontainer");
        jsonData.data.forEach((card, i)=> {
            let cardElement = templateCard.cloneNode(true);
            let numberString = card.cardnumber.toString();
            cardElement.querySelector("#user-name-surname");
            cardElement.querySelector("#number-part1").innerHTML = numberString.substr(0, 4);
            cardElement.querySelector("#number-part2").innerHTML = numberString.substr(4, 8);
            cardElement.querySelector("#number-part3").innerHTML = numberString.substr(8, 12);
            cardElement.querySelector("#number-part4").innerHTML = numberString.substr(12, 16);
            cardElement.querySelector("#end-date").innerHTML = card.expiry;
            cardElement.querySelector("#card-seq-number").innerHTML = i + 1;
            cardElement.querySelector("#cvc").innerHTML = card.cvc;
            document.getElementById("cards").appendChild(cardElement);
        })
        templateCard.remove();

    })
}

const insertSkin = (skin, skincontainer) => {
    let container = document.getElementById(skincontainer);

    let item = document.getElementById("item").cloneNode(true);
    if (skin.idskin === undefined) {
        skin.idskin = skin.id;
    }
    item.id = skin.idskin;
    item.style.display = "inherit";
    container.appendChild(item);

    let image = item.querySelector("#skin-image");
    item.style.cursor = "pointer";
    item.onclick = () => window.location.href = "/skin/" + skin.idskin;

    let name = item.querySelector("#skin-name");
    let price = item.querySelector("#skin-price");

    image.setAttribute("src", skin.imagelink);
    name.innerHTML = skin.name;
    price.innerHTML = skin.price + " €";
}

displayOrRedirect().then(() => {
    testAuth()
        .then(user => {
            userId = user.id;
            loadData(user);

            fetch("/api/skin/ownedBy/" + user.id, {
                method: "POST"
            }).then(async res => {
                let jsonData = await res.json();
                jsonData.skins.forEach(item => insertSkin(item, "skincontainer"));
            });

            fetch("/api/transaction/" + user.id, {
                method: "POST"
            }).then(async result => {
                let jsonData = await result.json();

                if (jsonData.success == false) { return; }

                let transactions = jsonData.data;
                transactions.forEach(t => addTransaction(t));

                setCards();
                getSoldSkins();
            });

            var callback = function (res) {
                if (res.success === true) {
                    imgLink = res.data.link;
                }
            };
        
            let imgur = new Imgur({
                clientid: imgurClient.clientId,
                callback: callback
            });
        });
});


const sellFormCheck = () => {
    let name = document.getElementById('sell-skin-name').value;
    let price = document.getElementById('sell-skin-price').value;
    let img = document.getElementById('sell-skin-image').value;

    let voids = [];
    let errors = [];
    if (!name) {
        voids.push('nome');
    }
    if (!price) {
        voids.push('prezzo');
    }
    if (!imgLink) {
        voids.push('immagine');
    }

    if (voids.length > 0) {
        errors.push("I campi " + voids.join(', ') + " sono obbligatori");
    }

    if (errors.length > 0) {
        displayErrors(errors, 'skin-error-list');
        return false;
    }
    return true;
}

const clearSellForm = () => {
    document.getElementById('sell-skin-name').value = "";
    document.getElementById('sell-skin-price').value = "";
    imgLink = undefined;
}

let sellCloseButton = document.getElementById('sell-close-button');
let sellSaveButton = document.getElementById('sell-save-button');

sellCloseButton.addEventListener("click", () => {
    document.getElementById("sellForm").style.display = "none";
    clearSellForm();
});

let sellSkinButton = document.getElementById('sellSkin');
sellSkinButton.addEventListener("click", () => {
    document.getElementById('sellForm').style.display = "block";
});

sellSaveButton.addEventListener("click", () => {
    if(!sellFormCheck()) { return; }

    let name = document.getElementById('sell-skin-name').value;
    let price = document.getElementById('sell-skin-price').value;
    let img = imgLink;

    let data = {
        userId: userId,
        name: name,
        price: price,
        image: img
    }
    sendSkin(data);
});

const sendSkin = (skin) => {
    fetch('/api/skin/insert', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(skin)
    }).then( async res => {
            let jsonData = await res.json();
            if (jsonData.success == true) {
                simpleNotify.notify("Skin aggiunta con successo", undefined);
                document.getElementById("sellForm").style.display = "none";
                getSoldSkins();
            } else {
                simpleNotify.notify("Abbiamo avuto qualche problema, riprova più tardi", 'is-danger');
            }
            clearSellForm();
        });
}

const addSoldSkin = (skin) => {
    insertSkin(skin, "soldSkincontainer");
}

const getSoldSkins = () => {
    document.getElementById("soldSkincontainer").innerHTML = "";
    fetch('/api/skin/soldBy/' + userId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then( async res => {
        let jsonData = await res.json();
        if (jsonData.success == true) {
            let soldSkins = jsonData.skins;
            soldSkins.forEach( skin => addSoldSkin(skin) );
        }
    });
}