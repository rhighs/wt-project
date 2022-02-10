let selectOrder = document.getElementById('order');

selectOrder.addEventListener('change', (event) => {
    let result = parseInt(event.target.value);
    let href = '/skins?';

    if (currentPage > 1) { href += 'page=' + currentPage }
    switch (result) {
        case 1:
            href += '&orderby=crescente'
            break;
        case 2:
            href += '&orderby=decrescente'
            break;
        default:
            break;
    }

    event.target.setAttribute
});