let nav;
let navButton;
let subContainer;
let bars;
let height;
let body;
let html;
let scrollProgress;
let scrollProgressContainer;
let clientScrollHeight = 0;
let progressPercent;
let container;
let informationAnchor;
let skillsAnchor;
let projectsAnchor;
let historyAnchor;
let contactAnchor;
let certificatesAnchor;

let sun;
let moon;
let styleColor;
let colorThemeMeta;

function setSun(){
	moon.classList.remove("hideSunMoon");
	moon.classList.add("showSunMoon");
	sun.classList.remove("showSunMoon");
	sun.classList.add("hideSunMoon");
	styleColor.href="public/assets/css/styleLight.css";
	colorThemeMeta.content = "#2C82C9";
	let d = new Date();
	d.setTime(d.getTime() + (365*24*60*60*1000));
	document.cookie = 'theme=sun; expires=' + d.toUTCString()+'; path=/';
}

function setMoon(){
	sun.classList.remove("hideSunMoon");
	sun.classList.add("showSunMoon");
	moon.classList.remove("showSunMoon");
	moon.classList.add("hideSunMoon");
	styleColor.href="public/assets/css/styleDark.css";
	colorThemeMeta.content = "#2d4483";
	let d = new Date();
	d.setTime(d.getTime() + (365*24*60*60*1000));
	document.cookie = 'theme=moon; expires=' + d.toUTCString()+'; path=/';
}

function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) === ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) === 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

(function(){
	nav = document.getElementsByTagName("nav")[0];
	navButton = document.getElementById("navButton");
	subContainer = document.getElementById("subContainer");
	container = document.getElementById("container");
	bars = document.getElementsByClassName("bar");
	scrollProgress = document.getElementById("scrollProgress");
	scrollProgressContainer = document.getElementById("scrollProgressContainer");

	sun = document.getElementById("sun");
	moon = document.getElementById("moon");
	styleColor = document.getElementById("styleColor");
	colorThemeMeta = document.getElementById("themeColor");

	let cookie = getCookie("theme");
	if(cookie === "moon"){
		setMoon();
	}

	sun.addEventListener("click", function(){
		setSun();
	});

	moon.addEventListener("click", function(){
		setMoon();
	});

	certificatesAnchor = document.getElementById("certificates");
    contactAnchor = document.getElementById("contact");
    skillsAnchor = document.getElementById("skills");
    informationAnchor = document.getElementById("information");
	projectsAnchor = document.getElementById("projects");
	historyAnchor = document.getElementById("history");

	body = document.body;
    html = document.documentElement;

	navButton.addEventListener("click", function(){
		if(nav.classList.contains("translateHide"))
			openMenu();
		else
			closeMenu(true);
	});

	body.addEventListener("click", function(e){
        if(!nav.classList.contains("translateHide")){
            if(e.target !== nav && e.target.parentNode != null && e.target.parentNode !== nav && e.target.parentNode.parentNode !== nav)
                closeMenu(true);
        }
	});
})();

function openMenu(){
	nav.classList.remove("translateHide");
	subContainer.classList.add("translateShow");
	bars[0].id="bar1Open";
	bars[1].id="bar2Open";
	bars[2].id="bar3Open";
	scrollProgressContainer.classList.add("translateProgressBar");
	body.classList.add("overflowHidden");
}

function closeMenu(removeFlow){
	nav.classList.add("translateHide");
	subContainer.classList.remove("translateShow");
	bars[0].id="bar1";
	bars[1].id="bar2";
	bars[2].id="bar3";
	scrollProgressContainer.classList.remove("translateProgressBar");
	if(removeFlow)
        body.classList.remove("overflowHidden");
}
