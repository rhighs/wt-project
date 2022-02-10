let btnLeft = document.getElementById('btn-left');
let btnRight = document.getElementById('btn-right');
let slideNumber = 0;
let waitTime = 5000; // milliseconds
let maxSlides = 3;
let userSlided = false;

const updateSlide = () => {
	let start = maxSlides * slideNumber;

    console.log(skins);
    console.log("Start is:", start);

	for (let i = start; i < start + 3; i++) {
		let card = document.getElementById('card-' + (i - start));

        card.onclick = () => window.location.href = "/skin/" + skins[i].id;

		let img = card.childNodes[1];
		img.src = skins[i].imagelink;

		let title = card.childNodes[3].childNodes[1];
		title.innerHTML = skins[i].name;
	}

	updateName(40);
}

const resetSlideTimer = () => {
	setTimeout(() => {
		resetSlideTimer();

        if (userSlided === true) {
            userSlided = false;
            return;
        }

        slideRight();
	}, waitTime);
}

const slideRight = () => {
	if (slideNumber == maxSlides - 1) {
		slideNumber = 0;
	} else {
		slideNumber++;
	}

	updateSlide();
}

const slideLeft = () => {
    if (slideNumber == 0) {
        slideNumber = maxSlides - 1;
    } else {
        slideNumber--;
    }

	updateSlide();
}

btnLeft.addEventListener('click', () => {
    userSlided = true;
    slideLeft();
});

btnRight.addEventListener('click', () => {
    userSlided = true;
    slideRight();
});

updateSlide();
resetSlideTimer();