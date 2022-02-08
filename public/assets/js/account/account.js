redirectIfNotAuthenticated();

testAuth()
    .then(result => {
        document.getElementById("name").innerHTML = result.name;
        document.getElementById("surname").innerHTML = result.surname;
        //document.getElementById("email").value = result.email;

        fetch("/api/transaction/" + result.id, {
            method: "POST"
        }).then(async result => {
            let jsonData = await result.json();
            console.log(jsonData);
            // Display transactions...
        });
    });
