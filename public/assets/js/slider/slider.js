let btnLeft = document.getElementById('btn-left');
let btnRight = document.getElementById('btn-right');
let slideNumber = 0;
let cardInSlide = 2;
let waitTime = 5000; // milliseconds

const updateSlide = () => {
	console.log(slideNumber);

	let start = cardInSlide * slideNumber;
	for (let i = 0; i <= cardInSlide; i++) {
		let cardNum = start + i;
		let card = document.getElementById('card-' + i);

		let img = card.childNodes[1];
		img.src = skins[cardNum]['imagelink'];

		let title = card.childNodes[3].childNodes[1];
		title.innerHTML = skins[cardNum]['name']
	}
}

const resetSlideTimer = () => {
	setTimeout( () => {
		btnRight.click();
		resetSlideTimer();
	}, waitTime);
}

resetSlideTimer();

btnLeft.addEventListener('click', () => {
	if (slideNumber == 0) {
		slideNumber = cardInSlide;
	} else {
		slideNumber--;
	}

	updateSlide();
});

btnRight.addEventListener('click', () => {
	if (slideNumber == cardInSlide) {
		slideNumber = 0;
	} else {
		slideNumber++;
	}

	updateSlide();
});