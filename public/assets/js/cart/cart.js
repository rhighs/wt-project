const getCart = (thenPromise) => {
    return testAuth().then(result => {
        fetch('/api/cart', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                "userId": result.id
            })
        }).then((res) => thenPromise(res));
    });
}

const appendToContainer = (idcart, skin) => {
    let imgCont = document.createElement('div');
    document.getElementById("cartcontainer").appendChild(imgCont);

    let elem = document.createElement("img");
    elem.setAttribute("id", "imgCart");
    elem.setAttribute("height", "80");
    elem.setAttribute("width", "80");
    elem.setAttribute("src", skin.imagelink);

    imgCont.appendChild(elem);
    imgCont.setAttribute("id", skin.id);
    imgCont.innerHTML += skin.name;
    imgCont.innerHTML += ' ';
    imgCont.innerHTML += skin.price;
    imgCont.innerHTML += ' ';

    let button = document.createElement('button');
    button.innerText = 'remove';

    button.addEventListener('click', () => {
        remove(skin.id, idcart);
    });

    imgCont.appendChild(button);
}

function onLoad() {
    updateCart();
};

const updateCart = () => {
    getCart(async res => {
        document.getElementById("cartcontainer").innerHTML = "";
        res.json().then(data => {
            if (data.success == true) {
                data.skins.forEach((skin) => appendToContainer(data.idcart, skin));
            }
        });
    });
}

function remove(skinId, idCart) {
    fetch('/api/cart/remove', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "skinId": skinId,
            "cartId": idCart
        })
    }).then(async res => {
        let jsonData = await res.json();

        console.log(jsonData.success);

        if (jsonData.success === true) {
            simpleNotify.notify("Skin rimossa");
            document.getElementById(skinId).remove();
        }

        console.log("ok");
    });
}