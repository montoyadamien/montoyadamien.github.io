const progressBar = () => {
	getMaxHeight();
	window.addEventListener('resize', function () {
		getMaxHeight();
	});
	window.addEventListener('scroll', function () {
		clientScrollHeight = window.scrollY;
		progressPercent = ((clientScrollHeight + window.innerHeight) / height) * 100;
		scrollProgress.style.width = progressPercent + '%';
	});
}

const getMaxHeight = () => {
	height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
	progressPercent = ((clientScrollHeight + window.innerHeight) / height) * 100;
	scrollProgress.style.width = progressPercent + '%';
}

const clickToScroll = () => {
	let navItems = document.getElementsByClassName('navItem');
	for (let i = 0; i < navItems.length; i++) {
		navItems[i].addEventListener('click', function (e) {
			e.preventDefault();
			if (i === 0)
				scrollTo(informationAnchor);
			else if (i === 1)
				scrollTo(skillsAnchor);
			else if (i === 2)
				scrollTo(projectsAnchor);
			else if (i === 3)
				scrollTo(historyAnchor);
			else if (i === 4)
				scrollTo(contactAnchor);
			closeMenu(true);
		});
	}
}

const scrollTo = (element) => {
	window.scroll({
		behavior: 'smooth',
		top: element.offsetTop
	});
}

(() => {
	clickToScroll();
	progressBar();
})();