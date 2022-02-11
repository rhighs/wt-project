let total = 0;
let cartId;

// cart request
const getCart = () => {
    return testAuth()
        .then(result => {
            return fetch('/api/cart', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "userId": result.id
                })
            });
        });
}

const insertItem = (skin) => {
    let container = document.getElementById("cartcontainer");
    let item = document.getElementById("item").cloneNode(true);
    item.id = skin.id;
    item.style.display = "inherit";
    container.appendChild(item);
    let image = item.querySelector("#skin-image");
    let name = item.querySelector("#skin-name");
    let price = item.querySelector("#skin-price");
    let deleteButton = item.querySelector("#skin-delete");

    image.setAttribute("src", skin.imagelink);

    deleteButton.onclick = () => {
        remove(skin);
    };

    name.innerHTML = skin.name;
    price.innerHTML = skin.price;

    total += skin.price;
}

// remove item request
function remove(skin) {
    fetch('/api/cart/remove', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "skinId": skin.id,
            "cartId": cartId
        })
    }).then(async res => {
        let jsonData = await res.json();

        if (jsonData.success === true) {
            simpleNotify.notify("Skin rimossa");
            document.getElementById(skin.id).remove();
            total -= skin.price;
            makeCheckoutBar();
        }
    });
}

const makeCheckoutBar = () => {
    let checkoutbar = document.getElementById("checkoutbar");
    let totalValue = checkoutbar.querySelector("#totalValue");
    let checkoutButton = checkoutbar.querySelector("#checkout-button");

    totalValue.innerHTML = total + " €";
    checkoutButton.onclick = () => window.location.href = "/checkout?cartId=" + cartId;
    if (total === 0) {
        document.getElementById("checkout-button").classList.add("disabled");
    }
    
}

const createCart = () => {
    getCart().then(res => {
        res.json()
            .then(data => {
                if (data.success == true) {
                    cartId = data.idcart;
                    data.skins.forEach(skin => insertItem(skin));

                    
                    makeCheckoutBar();
                }
            });
    });
}

createCart();
