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
            console.log("ok");
        }
    });
});    
}