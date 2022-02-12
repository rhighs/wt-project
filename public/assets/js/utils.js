const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
}

const displayErrors = (errorList, errorId) => {
    let errorString = "";

    for (let error of errorList) {
        errorString += "- " + error + ".<br>";
    }

    document.getElementById(errorId).innerHTML = errorString;
    setTimeout(() => {
        document.getElementById(errorId).innerHTML = "";
    }, 4000 * errorList.length);
}

const openTab = (evt, tabName) => {
    let tabs = document.getElementsByClassName("content-tab");

    for (let i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
    }

    let tablinks = document.getElementsByClassName("tab");

    for (let i = 0; i < tabs.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " is-active";
}