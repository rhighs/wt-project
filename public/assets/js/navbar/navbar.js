const renderRightSide = async () => {
    let result = await testAuth();

    let authorizedButtons = document.getElementById("authorized-buttons");
    let unauthorizedButtons = document.getElementById("unauthorized-buttons");

    let toHide = result === undefined ? authorizedButtons : unauthorizedButtons;
    let toShow = result === undefined ? unauthorizedButtons : authorizedButtons;

    toHide.style.zIndex = -1;
    toHide.style.position = "fixed";
    toShow.style.visibility = "visible";
}

renderRightSide();

document.getElementById("logout-button").onclick = () => {
    logout();
    window.location.href = "/";
}