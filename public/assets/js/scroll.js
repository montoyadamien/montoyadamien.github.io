(function(){
	clickToScroll();
	progressBar();
})();

function progressBar(){
    getMaxHeight();
    window.addEventListener('resize', function(){
    	getMaxHeight();
    });
	window.addEventListener('scroll', function(){
		clientScrollHeight = window.pageYOffset;
		progressPercent = ((clientScrollHeight+window.innerHeight)/height)*100;
		scrollProgress.style.width = progressPercent+'%';
	});
}

function getMaxHeight(){
	height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
	progressPercent = ((clientScrollHeight+window.innerHeight)/height)*100;
	scrollProgress.style.width = progressPercent+'%';
}

function clickToScroll(){
	let navItems = document.getElementsByClassName('navItem');
	for(let i=0;i<navItems.length;i++){
		navItems[i].addEventListener('click', function(e){
			e.preventDefault();
			if(i===0)
				scrollTo(informationAnchor);
			else if(i===1)
				scrollTo(skillsAnchor);
			else if(i===2)
				scrollTo(projectsAnchor);
            else if(i===3)
                scrollTo(historyAnchor);
            else if(i===4)
                scrollTo(contactAnchor);
			closeMenu(true);
		});
	}
}

function scrollTo(element){
    window.scroll({
        behavior: 'smooth',
        top: element.offsetTop
    });
}