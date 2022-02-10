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
let total = 0;
const appendToContainer = (idcart, skin) => {
    let imgCont = document.createElement('div');
    let descriptCont= document.createElement('div');
    descriptCont.setAttribute("text-align", "right");
    document.getElementById("cartcontainer").appendChild(imgCont);
    imgCont.appendChild(descriptCont);
    let elem = document.createElement("img");
    elem.setAttribute("border","2px solid transparent");
    elem.setAttribute("id", "imgCart");
    elem.setAttribute("height", "120");
    elem.setAttribute("width", "120");
    elem.setAttribute("src", skin.imagelink);
    imgCont.style.border="thin dotted white";
    imgCont.appendChild(elem);
    imgCont.appendChild(descriptCont);

    imgCont.setAttribute("id", skin.id);

    let paragraph = document.createElement('p');
    paragraph.style.fontSize="24px"
    paragraph.innerHTML += skin.name;
    paragraph.innerHTML += '  €';
    paragraph.innerHTML += skin.price;
    paragraph.innerHTML += ' ';
    descriptCont.appendChild(paragraph);

    let button = document.createElement('button');
    button.style.color="inherit";
    button.style.marginLeft="95%";
    button.style.fontSize="24px";
    button.style.backgroundColor="transparent";
    button.style.borderColor="transparent";
    
    button.innerText = 'X';

    button.addEventListener('click', () => {
        remove(skin.id, idcart);
    });

    descriptCont.appendChild(button);
    total+=skin.price;
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
                appendCheckout(data.idcart);
            }
        });
    });
}

function appendCheckout(idcart) {
    let paragraph = document.createElement('p');
    paragraph.style.fontSize="24px";
    paragraph.style.marginTop="10%";
    paragraph.innerHTML += 'Totale: ';
    paragraph.innerHTML += total;
    paragraph.innerHTML += '  €';
    let button = document.createElement('button');
    button.innerHTML = "Checkout";
    button.style.color="white";
    button.style.marginLeft="95%";
    button.style.marginTop="10%";
    button.style.fontSize="24px";
    button.style.backgroundColor="green";
    button.style.borderColor="transparent";
    button.style.borderRadius="3px";
    button.addEventListener('click', () => {
        checkout(idcart);
    });
    document.getElementById("cartcontainer").appendChild(paragraph);
    document.getElementById("cartcontainer").appendChild(button);
}

function checkout(idcart) {
    url = "/checkout?cartId=";
    url+=idcart;
    window.location.href = url;
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
            location.reload();
        }

        console.log("ok");
    });
}