let projects = [];
let projectsElement = [];
let projectDisplayOffset = 0;
let projectsDisplayed = false;
let moreProjectsOpen = false;
let projectDisplayerContainer;

(function(){
    projectDisplayerContainer = document.getElementById("projectDisplayerContainer");

    events.push(["Baccalauréat STI2D SIN - Lycée Camus Fréjus", "2014 - 2016"]);
    events.push(["Emploi Saisonnier - Société Générale Fréjus", 2016]);
    events.push(["<a target='_blank' href=\"/public/media/digital_active.pdf\">Certificat Google Digital Active</a>", 2016]);
    events.push(["DUT Informatique Nice Côte d'Azur", "2016 - 2018"]);
    events.push(["Emploi Saisonnier - Société Générale Carpentras", 2017]);
    events.push(["Stage DUT Informatique - Da Nang University of Technology - Vietnam", 2018]);
    events.push(["Diplôme Ingénieur en Informatique - Polytech Nice Sophia", "2018 - En cours"]);

	projectDisplayOffset = projectsAnchor.offsetTop;

	let name;
	let logo;
	let description;
	let languages;
	let links;
	let backgroundColor;

	name = "Événements";
	logo = "/public/images/projects/event.png";
	description =
			"Cette page recense les différents événements de programmation auxquels j'ai participé :<br /><br />"+
			"Nuit de l'info - 2016 - 2017 - 2018<br />"+
			"UCAnCODE - 2018<br />"+
			"Le Shaker Coding Battle - 2017 - 2018<br />"+
			"Google Hash Code - 2019"
	languages = ["JAVA", "VueJS", "JavaScript", "C"];
	links = [
		["Certificat GHC 2019 (7500 teams)", "/projects/events/ghc_2019.pdf"],
		];
	backgroundColor = "2c3e50";
	projects.push(new Project(name, logo, description, languages, links, backgroundColor));

	name = "Projets Divers";
    logo = "/public/images/projects/divers.png";
    description = 
    	"Pong : ce jeu est à faire à deux. Chaque joueur contrôlant une raquette doit faire rebondir la balle sinon il perd. Se joue avec Z et A ainsi que Haut et Bas.<br /><br />"+
    	"Taquin : le but de ce jeu est le déplacement d'élements pour reconstituer une suite. Le jeu se jou au click via la souris.<br /><br />" +
        "2048 : le but du jeu est de coupler des tuiles de même valeur pour en obtenir de plus grandes. Se joue avec les touches Haut, Bas, Gauche et Droite.<br /><br />" +
        "Sudoku : le but est de compléter la grille avec des nombres ne se trouvant que sur une ligne, sur une colonne et dans un groupe de 9 cases.<br /><br />" +
		"Carnet de bord : c'est un mini cours rédigé dans le cadre d'un TP dans le but d'apprendre la programmation orientée objet.<br /><br />" +
        "Carnet de bord v2 : c'est un mini cours rédigé dans le cadre d'un TP dans le but d'apprendre la programmation orientée objet d'une manière plus évoluée.";
    languages = ["HTML", "CSS", "JavaScript"];
    links = [
		["Pong", "/projects/pong/index.html"],
    	["Dames", "/projects/dames/index.html"],
        ["Taquin", "/projects/taquin/index.html"],
        ["2048", "/projects/2048/index.html"],
        ["Sudoku", "/projects/sudoku/index.html"],
        ["Carnet de bord", "/projects/carnetdebord/index.html"],
        ["Carnet de bord v2", "/projects/carnetdebordCPOO/index.html"]];
    backgroundColor = "2c3e50";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

    name = "Garage JMS & Co";
    logo = "/public/images/projects/jms.JPG";
    description = "Le site web est une vitrine pour un garage automobile contenant diverses informations sur celui-ci.<br /><br />Il permet de faire la demande de devis en ligne ainsi que récupérer les avis des utilisateurs. La protection Google reCAPTCHA a été mise en place pour éviter tout abus lors de l'envoi de commentaire.";
    languages = ["HTML", "CSS", "PHP", "SQL"];
    links = [["Site web", "http://www.garagejms.com/"]];
    backgroundColor = "ff0000";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

    name = "Business Modèle";
    logo = "/public/images/projects/business_model.png";
    description = "Business Modèle est un site web contenant des articles d'études de développement des grandes entreprises.<br /><br />La structure du projet repose sur un modèle MVC performant assurant une maintenance du code plus rapide.<br /><br />Logo produit par Marie-Anne Amélie sous Illustrator.";
    languages = ["HTML", "CSS", "PHP", "SQL", "JavaScript"];
    links = [["Site web", "http://businessmodele.fr"]];
    backgroundColor = "d59d53";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

    name = "MyWorkouts";
    logo = "/public/images/projects/myworkouts.png";
    description = "MyWorkouts est une application android de gestion d'entrainement de musculation, de crossfit ainsi que de street workout.<br /><br />Grâce au minuteur intégré qui se lance à la fin d'une série vous ne louperez plus jamais vos pauses ! Chaque entrainement effectué sera ajouté à l'historique pour visualiser vos améliorations depuis le début.";
    languages = ["Java"];
    links = [["Site Web", "https://gorillabox.github.io/projects/myworkouts/"], ["Google Play", "https://play.google.com/store/apps/details?id=gorillabox.myworkouts"]];
    backgroundColor = "0bcd62";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

    name = "Escape JUFAC";
    logo = "/public/images/projects/escapejufac.png";
    description = "Escape JUFAC est un projet universitaire dont le but était de développer un jeu vidéo dit \"Escape Game\". <br /><br />J'ai donc fait parti de l'équipe de développement du jeu vidéo 2D en tant que développeur Java ainsi que graphiste pour certaines parties du jeu.<br /><br />Le jeu vidéo a été développé sous éclipse en Java Swing reposant sur une forge utilisée via Git.";
    languages = ["Java"];
    links = [["Site web", "https://escape-jufac.000webhostapp.com/"]];
    backgroundColor = "dbdbdb";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

	name = "MyGameDB";
	logo = "/public/images/projects/mygamedb.png";
	description = "MyGameDB est un site web de gestion de collection de jeux vidéo et de consoles administré par moi-même. <br /><br />MyGameDB vous permet d'ajouter les consoles et jeux vidéos que vous possédez, d'indiquer leur statut et bien d'autres options.<br /><br />Vous pourrez également ajouter des jeux à votre wishlist dans le but d'être notifié si un membre possède le jeu en plusieurs exemplaires. Idéal pour faire des échanges.";
	languages = ["HTML", "CSS", "PHP", "SQL", "JavaScript", "jQuery", "Java (Android)"];
	links = [["Site web", "https://mygamedb.com"], ["Google Play", "https://play.google.com/store/apps/details?id=gorillabox.mygamedb"]];
	backgroundColor = "1d3e5c";
	projects.push(new Project(name, logo, description, languages, links, backgroundColor));

    name = "EnjoyTips";
    logo = "/public/images/projects/enjoytips.png";
    description = "EnjoyTips est un site web communautaire de partage d'astuces et de tutoriels. <br /><br />Le site web est a présent à l'abandon mais il m'a permis de mettre en pratique mes compétences pour créer un forum de partage.";
    languages = ["HTML", "CSS", "PHP", "SQL", "JavaScript"];
    links = [["Site web", "http://www.enjoytips.altervista.org/"]];
    backgroundColor = "5fbc87";
    projects.push(new Project(name, logo, description, languages, links, backgroundColor));

	let i = 0;
	while(i<projects.length && i < 3){
		buildProject(i);
		i++;
	}

	window.addEventListener("scroll", function(){
		if(window.pageYOffset >= (projectDisplayOffset-(window.innerHeight/2)) && projectsDisplayed === false){
			projectsDisplayed = true;
			let i = 0;
			while(i<projectsElement.length && i < 3){
				setAnimListenerOpen(projectsElement[i], i);
				i++;
			}
		}
	});

	if(projects.length > 3){
		let moreProjects = document.createElement("div");
		moreProjects.id = "moreProjects";
		let plus = document.createElement("div");
		plus.id = "morePlus";
		moreProjects.appendChild(plus);
		let plusBar = document.createElement("div");
		plus.appendChild(plusBar);
		plusBar = document.createElement("div");
		plusBar.classList.add("plusBarRotate");
		plus.appendChild(plusBar);
		let showMore = document.createElement("div");
		showMore.appendChild(document.createTextNode("Voir plus de projets"));
		moreProjects.appendChild(showMore);
		projectsAnchor.appendChild(moreProjects);
		moreProjects.addEventListener("click", function(){
			if(moreProjectsOpen === false){
				showMore.innerText = "Voir moins de projets";
				plusBar.classList.add("plusBarRotateHidden");
				moreProjectsOpen = true;
				for(let i=3; i<projects.length;i++){
					buildProject(i);
					setAnimListenerOpen(projectsElement[i], i);
				}
			}else{
				showMore.innerText = "Voir plus de projets";
				plusBar.classList.remove("plusBarRotateHidden");
				moreProjectsOpen = false;
				for(let i = projects.length-1; i>2;i--){
					setAnimListenerClose(projectsElement[i], (projects.length-(i+1)));
				}
			}
		});
	}
})();

function setAnimListenerOpen(object, delay){
	object.style.animation = "projetPop 0.6s "+(delay/8)+"s";
	object.addEventListener("animationend", animationOpenEvent);
}

function animationOpenEvent(e){
	e.target.removeEventListener("animationend", animationOpenEvent);
	e.target.style.transform = "scale(1)";
	e.target.style.animation = "";
}

function animationCloseEvent(e){
	e.target.removeEventListener("animationend", animationCloseEvent);
	e.target.parentNode.removeChild(e.target);
	e.target.style.animation = "";
	projectsElement.pop();
}

function setAnimListenerClose(object, delay){
	object.style.animation = "projetUnpop 0.6s "+(delay/8)+"s";
	object.addEventListener("animationend", animationCloseEvent);
}


function buildProject(i){
	let div = document.createElement("div");
	div.classList.add("projectDisplay");
	div.classList.add("projectDisplayHide");
	projectsElement.push(div);
	div.style.backgroundColor = "#"+projects[i].backgroundColor;
	let projectId = document.createElement("input");
	projectId.type = "hidden";
	projectId.value = i;
	projectId.name = "projectId";
	div.appendChild(projectId);
	let content = document.createElement("div");
	content.classList.add("content");
	div.appendChild(content);
	let show = document.createElement("div");
	show.classList.add("contentShow");
	div.appendChild(show);
	show.appendChild(document.createTextNode(projects[i].name));
	let img = document.createElement("img");
	img.src = projects[i].logo;
	img.alt = "";
	content.appendChild(img);
	projectsAnchor.appendChild(div);
	div.addEventListener("click", function(e){
		buildProjectPopup(parseInt(e.currentTarget.childNodes[0].value));
	});
}

function closePopup(){
    body.classList.remove("overflowHidden");
	projectDisplayer.classList.add("leftSlide");
	projectDisplayer.classList.remove("leftSlideNone");
	container.classList.remove("slide");
	nav.classList.remove("slide");
    projectDisplayerContainer.classList.remove("zIndex");
    projectDisplayerContainer.classList.add("overflowHidden");
    projectDisplayerContainer.classList.remove("overflowAuto");
}

function buildProjectPopup(projectNumber){
    body.classList.add("overflowHidden");
    projectDisplayerContainer.classList.add("zIndex");
	projectDisplayerContent.innerHTML = "";
    projectDisplayerContainer.classList.remove("overflowHidden");
    projectDisplayerContainer.classList.add("overflowAuto");
	projectDisplayer.classList.remove('leftSlide');
	projectDisplayer.classList.add("leftSlideNone");
	container.classList.add("slide");
	nav.classList.add("slide");
	arrowContainer.addEventListener("click", function(){
		closePopup();
	});
	let h1Container = document.createElement("div");
	h1Container.classList.add("h1Container");
	let h1 = document.createElement("h1");
	h1.appendChild(document.createTextNode(projects[projectNumber].name));
	h1Container.appendChild(h1);
	let middle = document.createElement("div");
	middle.id = "projectDisplayerMiddle";
	let pictureContainer = document.createElement("div");
	pictureContainer.id = "pictureContainer";
	pictureContainer.classList.add("projectDisplay");
	pictureContainer.style.transform = "scale(1)";
	pictureContainer.style.borderRadius = "50%";
	let content = document.createElement("div");
	content.classList.add("content");
	let img = document.createElement("img");
	img.src = projects[projectNumber].logo;
	pictureContainer.style.backgroundColor = "#"+projects[projectNumber].backgroundColor;
	content.appendChild(img);
	pictureContainer.appendChild(content);
	let descriptionContainer = document.createElement("div");
	descriptionContainer.id = "descriptionContainer";
	descriptionContainer.innerHTML = projects[projectNumber].description;
	let linksDescription = descriptionContainer.getElementsByTagName("a");
	for(let i=0;i<linksDescription.length;i++){
		linksDescription[i].addEventListener("click", function(e){
			e.preventDefault();
			closePopup();
		});
	}
    let languagesLine = document.createElement("div");
    languagesLine.id = "projectDisplayerLanguages";
    for(let i=0;i<projects[projectNumber].languages.length;i++){
        let div = document.createElement("div");
        div.appendChild(document.createTextNode(projects[projectNumber].languages[i]));
        languagesLine.appendChild(div);
    }
	let links = document.createElement("div");
	links.id = "projectDisplayerLinks";
	for(let i=0;i<projects[projectNumber].links.length;i++){
		let a = document.createElement("a");
		a.href = projects[projectNumber].links[i][1];
		a.target = "_blank";
		a.appendChild(document.createTextNode(projects[projectNumber].links[i][0]));
		links.appendChild(a);
	}
	middle.appendChild(pictureContainer);
	middle.appendChild(descriptionContainer);
	projectDisplayerContent.appendChild(h1Container);
	projectDisplayerContent.appendChild(middle);
    projectDisplayerContent.appendChild(languagesLine);
	projectDisplayerContent.appendChild(links);
}

function Project(name, logo, description, languages, links, backgroundColor){
	this.name = name;
	this.description = description;
	//development languages array
	this.languages = languages;
	this.logo = logo;
	//link is an array with name to display and the linkg
	this.links = links;
	this.backgroundColor = backgroundColor;
}
