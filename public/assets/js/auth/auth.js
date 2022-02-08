const testAuth = async (token) => {
    if (!token) {
        token = localStorage.getItem("token");
    }

    if (!token) {
        return undefined;
    }

    return await fetch("/api/testAuth", {
        method: "POST",
        headers: {
            "token": token
        }
    }).then(async res => {
        if (res.status === 200) {
            let jsonData = await res.json();

            if (jsonData.success === true) {
                return jsonData.userdata;
            }
        }

        return undefined;
    });
}

const redirectIfNotAuthenticated = () => {
    testAuth()
        .then(result => {
            if (result === undefined) {
                window.location.href = "/";
            }
        })
}

const logout = () => {
    localStorage.removeItem("token");
}
