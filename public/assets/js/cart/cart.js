function onLoad() {
  testAuth().then(result => {
    fetch('/api/cart', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "userId" : result.id
        })
    }).then(async res => {
        let jsonData = await res.json();

        if(jsonData.success) {
            
            for (let i = 0; i < jsonData.length; i++) {
                var elem;
                var imgCont;
                imgCont = document.createElement('div');
                document.getElementById("cartcontainer").appendChild(imgCont);
                elem= document.createElement("img");
                elem.setAttribute("id", "imgCart");
                elem.setAttribute("height", "80");
                elem.setAttribute("width", "80");
                elem.setAttribute("src", jsonData.skins[i]["imagelink"]);
                imgCont.appendChild(elem);
                imgCont.innerHTML+=jsonData.skins[i]["name"];
                imgCont.innerHTML+=' ';
                imgCont.innerHTML+=jsonData.skins[i]["price"];
                imgCont.innerHTML+=' ';
                const button = document.createElement('button');
                button.innerText = 'remove';
                button.addEventListener('click', () => {
                    remove(jsonData.skins[i]["id"],jsonData.idcart)
                  })
                imgCont.appendChild(button);
            } 
            console.log("ok");
        }
    });
});    
}

function remove(skinId,idCart){
    fetch('/api/cart/remove', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "skinId" : skinId,
            "cartId" : idCart
        })
    }).then(async res => {
        let jsonData = await res.json();

        if(jsonData.success) {
            alert("remove!");
            location.reload();
            } 
            console.log("ok");
        });    
}