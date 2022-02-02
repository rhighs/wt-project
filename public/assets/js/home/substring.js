function subStringArray(titleColletion) {
    const maxLenght = 44;
    
    Array.from(titleColletion).forEach(i => {
        if(i.innerText.length > maxLenght) {
            i.innerText = i.innerText.substring(0, maxLenght) + '...';
        }
        console.log(i.innerText);
    });
}


document.addEventListener('DOMContentLoaded', () => {
    var titles = document.getElementsByClassName('title is-4');
    console.log(titles);
    subStringArray(titles);
});