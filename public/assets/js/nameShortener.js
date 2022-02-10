let maxLenght = 45;

const updateName = (maxLenght) => {
    let names = document.getElementsByClassName('short');

    Array.from(names).forEach( name => {
        if (name.innerHTML.length > maxLenght) {
            console.log(name.innerHTML);
            name.innerHTML = name.innerHTML.substring(0, maxLenght-3) + '...';
        }
    });
}

updateName(maxLenght);