function openTab(evt, tabName) {
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

const easterEgg = () => {
    if (Math.floor(Math.random() * 100) < 97) {
        return;
    }

    let frame = document.getElementById("3dframe");
    let newFrame = frame.cloneNode(true);
    frame.remove();

    newFrame.setAttribute("src", "https://www.krunker.io");
    document.body.innerHTML = "";
    document.body.appendChild(newFrame);
    newFrame.style.top = 0;
}

function add(idSkin) {
    testAuth().then(result => {
        if (result === undefined) {
            simpleNotify.notify("Solo gli utenti registrati possono comprare skin", "is-danger");
        }

        fetch("/api/cart", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                userId: result.id
            })
        }).then(async res => {
            let jsonData = await res.json();

            if (jsonData.skins.find(skin => skin.id === parseInt(idSkin)) !== undefined) {
                simpleNotify.notify("Stai già comprando questa skin, è consentita al massimo una skin per utente", "is-danger");
            } else {
                fetch('/api/skin', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        "skinId": idSkin,
                        "userId": result.id
                    })
                }).then(async res => {
                    let jsonData = await res.json();

                    if (jsonData.success === true) {
                        simpleNotify.notify("Skin aggiunta al carrello con successo");
                    } else {
                        simpleNotify.notify("Non siamo riusciti ad aggiungere la skin, riprova più tardi", "is-danger");
                    }
                });
            }
        });
    });
}

easterEgg();
