let checkoutFlags = {
    cardNumber: false,
    cardExpiry: false,
    cardCVC: false
}

let data = {
    cardNumber: 0,
    cardExpiry: Date.now(),
    cardCVC: 0
};

let cardNumberElement = document.getElementsByName("card-nr")[0];
let cardExpiryElement = document.getElementsByName("card-expiry")[0];
let cardCVCElement = document.getElementsByName("card-cvc")[0];

document.getElementById("checkout-button").onclick = () => checkout();

//https://stackoverflow.com/questions/6176802/how-to-validate-a-credit-card-number
const validateCardNumber = (number) => {
    let regex = new RegExp("^[0-9]{16}$");
    if (!regex.test(number))
        return false;

    return luhnCheck(number);
}

//https://stackoverflow.com/questions/6176802/how-to-validate-a-credit-card-number
const luhnCheck = (val) => {
    let sum = 0;

    for (let i = 0; i < val.length; i++) {
        let intVal = parseInt(val.substr(i, 1));

        if (i % 2 == 0) {
            intVal *= 2;
            if (intVal > 9) {
                intVal = 1 + (intVal % 10);
            }
        }

        sum += intVal;
    }

    return (sum % 10) == 0;
}

cardNumberElement.oninput = (event) => {
    let cardNumber = parseInt(event.target.value);

    checkoutFlags.cardNumber = isNaN(cardNumber) === false
        && validateCardNumber(cardNumber) === true;

    if (checkoutFlags.cardNumber) {
        data.cardNumber = cardNumber;
    }

    cardNumberElement.style.border = checkoutFlags.cardNumber === false ? "2px solid red" : "";
}

let lastDateChar = "";
cardExpiryElement.oninput = (event) => {
    let dateString = event.target.value;
    lastDateChar = dateString[dateString.length - 1];

    if (dateString.length === 2 && lastDateChar != "/") {
        cardExpiryElement.value += "/";
    }

    let splittedDate = dateString.split("/");
    checkoutFlags.cardExpiry = splittedDate.length > 1 && dateString.length === 5

    if (checkoutFlags.cardExpiry === true)  {
        let month = splittedDate[0];
        let year = "20" + splittedDate[1];
        let date = new Date(parseInt(year), parseInt(month));
        data.cardExpiry = date;
    }

    cardExpiryElement.style.border = checkoutFlags.cardExpiry === false ? "2px solid red" : "";
}

cardCVCElement.oninput = (event) => {
    let cvcNumber = parseInt(event.target.value);

    checkoutFlags.cardCVC = !isNaN(cvcNumber) && cvcNumber.toString().length === 3;
    if (checkoutFlags.cardCVC === true) {
        data.cardCVC = cvcNumber;
    }

    cardCVCElement.style.border = checkoutFlags.cardCVC === false ? "2px solid red" : "";
}

const checkout = () => {
    let valid = Object.values(checkoutFlags)
        .filter(value => value === false).length === 0;

    if (valid === false) {
        simpleNotify.notify("I dati inseriti non sono validi, correggili e riprova.", "is-danger");
        return;
    }

    fetch("/api/acceptPayment", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            cartId: cartId,
            ...data,
        })
    }).then(async res => {
        let jsonData = await res.json();

        if (jsonData.success === true) {
            simpleNotify.notify("Verrai reindirizzato a breve...", "is-info");
            simpleNotify.notify("Transazione andata a buon fine. grazie per aver comprato su SkuSkins!");
            setTimeout(() => window.location.href = "/account", 5000);
        }
    })
}
