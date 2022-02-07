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

function add(idSkin) {

    //let result = testAuth();
    fetch('/api/skin', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            skinId : "www"
            //userId : result["id"]
        })
    }).then(async res => {
        let jsonData = await res.json();

        if(jsonData.success) {
            console.log("ok");
            window.location.href = "/skins";
        }
    });
}