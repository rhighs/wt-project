function send() {
    let username = document.getElementsByClassName("input is-medium")[0];
    let email = document.getElementsByClassName("input is-medium")[1];
    let message = document.getElementsByClassName("textarea is-medium")[0];
    if(checkInput(username,email,message)){
        simpleNotify.notify("Messaggio inviato!");
        clearAll(username,email,message);
    }else{
        simpleNotify.notify("Messaggio non inviato!","danger");   
    }
}

function checkString(str) {
    return (!str && str.length === 0)
}

function checkInput(username,email,message) {
    
    if(checkString(username.value)){
        username.value="";
        username.setAttribute("placeholder","Nome mancante!");
        return false;
    }
    if(!validateEmail(email.value)){
        email.value="";
        email.setAttribute("placeholder","Email errata!");
        return false;
    }
    if(checkString(message.value)){
        message.value="";
        message.setAttribute("placeholder","Messaggio mancante!");
        return false;
    }
    return true;
}

function clearAll(username, email, message) {
    username.value = "";
    email.value = "";
    message.value = "";
}