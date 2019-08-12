let projects = [];
let projectsLoaded = false;
let projectsDisplayOffset = 0;
let numberProjectsToDisplay = 6;
let projectNormalBegin = 3;
let projectsContainer;

class Project{
    constructor(name, logo, description, languages, links, backgroundColor, date){
        this.name = name;
        this.description = description;
        //development languages array
        this.languages = languages;
        this.logo = logo;
        //link is an array with name to display and the linkg
        this.links = links;
        this.backgroundColor = backgroundColor;
        this.date = date;
    }
}

class Language{
    constructor(name, logo){
        this.name = name;
        this.logo = logo;
    }
}

class Link{
    constructor(name, logo, link){
        this.name = name;
        this.logo = logo;
        this.link = link;
    }
}

const LANGUAGES_ENUM = {
    JAVA: new Language("Java", "java.png"),
    PHP: new Language("PHP", "php.png"),
    MYSQL: new Language("MySQL", "mysql.png"),
    JAVASCRIPT : new Language("JavaScript", "javascript.png"),
    ANDROID : new Language("Android", "android.png"),
    JQUERY : new Language("jQuery", "jquery.png"),
    VUEJS : new Language("vueJs", "vuejs.png"),
    C : new Language("C", "c.png"),
    SYMFONY : new Language("Symfony", "symfony.png")
};

const LINKS_LOGO_ENUM = {
    GOOGLE_PLAY : "googleplay.png",
    WEBSITE : "website.png",
    FACEBOOK : "facebook.png",
    TWITTER : "twitter.png",
    FILE : "file.png",
    LINKEDIN : "linkedin.png"
};

(function(){
    projectsContainer = document.getElementById("projects-container");
    pushProjects();
    buildThreeFirstProjects();
    buildProjects();
    projectsScroll();
    window.addEventListener("scroll", function(){
        projectsScroll();
    });
})();

function pushProjects(){
    let description;

    description =
            "MyGameDB est un site web de gestion de collection de jeux vidéo et de consoles administré par mes soins. <br /><br />" +
            "Le site ainsi que l'application permettent d'ajouter jeux vidéos et consoles une fois un profil créé et connecté. Ils permettent de gérer toute une collection via différents champs et fonctionnalités.<br /><br />" +
            "L'application a été dévéloppée de manière native au système, en Java.";

    projects.push(
            new Project("MyGameDB", "mygamedb.png", description,
                        [LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.JQUERY, LANGUAGES_ENUM.PHP, LANGUAGES_ENUM.MYSQL, LANGUAGES_ENUM.JAVA, LANGUAGES_ENUM.ANDROID],
                [
                        new Link("Facebook", LINKS_LOGO_ENUM.FACEBOOK, "https://www.facebook.com/MyGameDB/"),
                        new Link("Twitter", LINKS_LOGO_ENUM.TWITTER, "https://twitter.com/MyGameDB"),
                        new Link("Google Play", LINKS_LOGO_ENUM.GOOGLE_PLAY, "https://play.google.com/store/apps/details?id=gorillabox.mygamedb"),
                        new Link("Site web", LINKS_LOGO_ENUM.WEBSITE, "https://mygamedb.com")
                        ],
                    "1d3e5c", "2017 - ?"));

    description =
            "Cette page recense les différents événements de programmation auxquels j'ai participé :<br /><br />"+
            "Nuit de l'info - 2016 - 2017 - 2018<br />"+
            "UCAnCODE - 2018<br />"+
            "Le Shaker Coding Battle - 2017 - 2018<br />"+
            "Google Hash Code - 2019";
    projects.push(
            new Project("Événements", "event.png", description,
                    [LANGUAGES_ENUM.VUEJS, LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.JAVA, LANGUAGES_ENUM.C],
                    [
                            new Link("Certificat GHC 2019 (1523/7500)", LINKS_LOGO_ENUM.FILE, "/projects/events/ghc_2019.pdf")
                    ],"16a085","2017 - ?"));

    description =
            "Pong : chaque joueur contrôlant une raquette doit faire rebondir la balle sinon il perd. Se joue avec Z et A ainsi que Haut et Bas.<br /><br />"+
            "Taquin : le but de ce jeu est le déplacement d'élements pour reconstituer une suite. Le jeu se jou au click via la souris.<br /><br />" +
            "2048 : le but du jeu est de coupler des tuiles de même valeur pour en obtenir de plus grandes. Se joue avec les touches Haut, Bas, Gauche et Droite.<br /><br />" +
            "Sudoku : le but est de compléter la grille avec des nombres ne se trouvant que sur une ligne, sur une colonne et dans un groupe de 9 cases.<br /><br />" +
            "Carnet de bord : c'est un mini cours rédigé dans le cadre d'un TP dans le but d'apprendre la programmation orientée objet.<br /><br />" +
            "Carnet de bord v2 : c'est un mini cours rédigé dans le cadre d'un TP dans le but d'apprendre la programmation orientée objet d'une manière plus évoluée.";
    projects.push(
            new Project("Projets Divers","divers.png", description,
            [LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.JAVA],
            [
                    new Link("Pong", LINKS_LOGO_ENUM.FILE, "/projects/pong/index.html"),
                    new Link("Dames", LINKS_LOGO_ENUM.FILE, "/projects/dames/index.html"),
                    new Link("Taquin", LINKS_LOGO_ENUM.FILE, "/projects/taquin/index.html"),
                    new Link("2048", LINKS_LOGO_ENUM.FILE, "/projects/2048/index.html"),
                    new Link("Sudoku", LINKS_LOGO_ENUM.FILE, "/projects/sudoku/index.html"),
                    new Link("Carnet de bord", LINKS_LOGO_ENUM.FILE, "/projects/carnetdebord/index.html"),
                new Link("Carnet de bord v2", LINKS_LOGO_ENUM.FILE, "/projects/carnetdebordCPOO/index.html")
            ], "16a085", "2017 - ?"));

    description =
            "Durant mon stage de première année à Polytech Nice-Sophia j'ai travaillé pour la Junior-Entreprise Polytech Nice Conseil.<br ><br >"+
            "J'ai eu pour mission de développer leur site web, la partie front ainsi que la partie back-end. J'ai choisi d'utiliser Symfony pour apprendre à utiliser ce framework.";
    projects.push(
            new Project("Polytech Nice Conseil", "pnc.png", description,
                    [LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.SYMFONY, LANGUAGES_ENUM.PHP, LANGUAGES_ENUM.MYSQL],
                    [
                        new Link("Twitter", LINKS_LOGO_ENUM.TWITTER, "https://twitter.com/PolytechConseil"),
                        new Link("Facebook", LINKS_LOGO_ENUM.FACEBOOK, "https://www.facebook.com/PolytechNiceConseil/"),
                        new Link("LinkedIn", LINKS_LOGO_ENUM.LINKEDIN, "https://www.linkedin.com/company/polytech-nice-conseil/"),
                        new Link("Site web", LINKS_LOGO_ENUM.WEBSITE, "https://polytechniceconseil.com")
                    ], "007cbc", "2019"));

    description =
            "MyWorkouts est une application android de gestion d'entrainement de musculation, de crossfit ainsi que de street workout.<br /><br />" +
            "L'application m'a permis de développer un minuteur lié à un système de notifications ainsi qu'un historique pour les entraînements.";
    projects.push(
            new Project("MyWorkouts", "myworkouts.png", description,
            [LANGUAGES_ENUM.JAVA, LANGUAGES_ENUM.ANDROID],
            [
                new Link("Site web", LINKS_LOGO_ENUM.WEBSITE, "https://gorillabox.github.io/projects/myworkouts/"),
                new Link("Google Play", LINKS_LOGO_ENUM.GOOGLE_PLAY, "https://play.google.com/store/apps/details?id=gorillabox.myworkouts")
            ], "0bcd62", "2017 - 2018"));

    description =
            "Le site web est une vitrine pour un garage automobile contenant diverses informations sur celui-ci.<br /><br />" +
            "Il permet de faire la demande de devis en ligne ainsi que récupérer les avis des utilisateurs. La protection Google reCAPTCHA a été mise en place pour éviter tout abus lors de l'envoi de commentaire.";
    projects.push(
            new Project("Garage JMS & Co", "jms.JPG", description,
            [LANGUAGES_ENUM.PHP, LANGUAGES_ENUM.MYSQL],
            [
                    new Link("Site web", LINKS_LOGO_ENUM.WEBSITE, "http://www.garagejms.com/")
            ], "ff0000", "2018"));

    description =
            "Business Modèle est un site web contenant des articles d'études de développement des grandes entreprises.<br /><br />" +
            "La structure du projet repose sur un modèle MVC performant assurant une maintenance du code plus rapide.<br /><br />Logo produit par Marie-Anne Amélie sous Illustrator.";
    projects.push(new Project("Business Modèle", "business_model.png", description,
            [LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.PHP, LANGUAGES_ENUM.MYSQL],
            [
                new Link("Facebook", LINKS_LOGO_ENUM.FACEBOOK, "https://www.facebook.com/BusinessModeleBM/"),
                new Link("Site Web", LINKS_LOGO_ENUM.WEBSITE, "http://businessmodele.fr")
            ], "d59d53", "2018"));

    description = "Escape JUFAC est un projet universitaire dont le but était de développer un jeu vidéo dit \"Escape Game\". <br /><br />" +
            "J'ai donc fait parti de l'équipe de développement du jeu vidéo 2D en tant que développeur Java ainsi que graphiste pour certaines parties du jeu.<br /><br />" +
            "Le jeu vidéo a été développé sous éclipse en Java Swing reposant sur une forge utilisée via Git.";
    projects.push(
            new Project("Escape JUFAC", "escapejufac.png", description,
            [LANGUAGES_ENUM.JAVA],
            [
                    new Link("Site Web", LINKS_LOGO_ENUM.WEBSITE, "https://escape-jufac.000webhostapp.com/")
            ], "dbdbdb", "2017"));

    description = "EnjoyTips est un site web communautaire de partage d'astuces et de tutoriels. <br /><br />" +
            "Le site web est a présent à l'abandon mais il m'a permis de mettre en pratique mes compétences pour créer un forum de partage.";
    projects.push(new Project("EnjoyTips", "enjoytips.png", description,
            [LANGUAGES_ENUM.JAVASCRIPT, LANGUAGES_ENUM.PHP, LANGUAGES_ENUM.MYSQL],
            [
                new Link("Site Web", LINKS_LOGO_ENUM.WEBSITE, "http://www.enjoytips.altervista.org/")
            ], "5fbc87", "2015"));
}

function buildThreeFirstProjects(){
    let container = document.createElement("div");
    container.classList.add("firsts-projects");

    let first = document.createElement("div");
    first.classList.add("project-item");
    first.classList.add("project-item-first");

        let date = document.createElement("div");
        date.classList.add("project-item-date");
        date.appendChild(document.createTextNode(projects[0].date));
        first.appendChild(date);

        let subContainer = document.createElement("div");
        subContainer.classList.add("project-item-picture-container");
        subContainer.style.backgroundColor = "#"+projects[0].backgroundColor;
        first.appendChild(subContainer);
            let pic = document.createElement("img");
            pic.classList.add("project-item-picture");
            pic.src = "/public/assets/images/projects/"+projects[0].logo;
            subContainer.appendChild(pic);
        let textContainer = document.createElement("div");
        textContainer.classList.add("project-item-text-container");
            let textSubContainer = document.createElement("div");
            textSubContainer.classList.add("project-item-text-sub-container");
                let text = document.createElement("div");
                text.classList.add("project-item-text");
                text.appendChild(document.createTextNode(projects[0].name));
                textSubContainer.appendChild(text);
            textContainer.appendChild(textSubContainer);
            let languages = document.createElement("div");
            languages.classList.add("project-item-languages-container");
            for(let i=0;i<projects[0].languages.length; i++){
                let language = document.createElement("div");
                language.classList.add("project-item-language-container");
                let logo = document.createElement("img");
                logo.classList.add("project-item-language-logo");
                logo.src = "/public/assets/images/icon/languages/"+projects[0].languages[i].logo;
                language.appendChild(logo);
                let div = document.createElement("div");
                div.classList.add("project-item-language-infobulle");
                div.appendChild(document.createTextNode(projects[0].languages[i].name));
                language.appendChild(div);
                languages.appendChild(language);
            }
            textContainer.appendChild(languages);
        first.appendChild(textContainer);

    let secondContainer = document.createElement("div");
    secondContainer.classList.add("project-item-seconds");
    secondContainer.appendChild(buildProject(projects[1]));
    secondContainer.appendChild(buildProject(projects[2]));

    container.appendChild(first);
    container.appendChild(secondContainer);

    projectsContainer.appendChild(container);
    first.addEventListener("click", function(e){
        clickOnProject(projects[0], e);
    });
}

function buildProjects(){
    for(let i = projectNormalBegin;i < numberProjectsToDisplay; i++) {
        projectsContainer.appendChild(buildProject(projects[i]));
    }
}

function buildProject(project){
    let item = document.createElement("div");
    item.classList.add("project-item");

    let date = document.createElement("div");
    date.classList.add("project-item-date");
    date.appendChild(document.createTextNode(project.date));
    item.appendChild(date);

    let subContainer = document.createElement("div");
    subContainer.classList.add("project-item-picture-container");
    subContainer.style.backgroundColor = "#"+project.backgroundColor;
    item.appendChild(subContainer);
    let pic = document.createElement("img");
    pic.classList.add("project-item-picture");
    pic.src = "/public/assets/images/projects/"+project.logo;
    subContainer.appendChild(pic);
    let textContainer = document.createElement("div");
    textContainer.classList.add("project-item-text-container");
        let textSubContainer = document.createElement("div");
        textSubContainer.classList.add("project-item-text-sub-container");
            let text = document.createElement("div");
            text.classList.add("project-item-text");
            text.appendChild(document.createTextNode(project.name));
            textSubContainer.appendChild(text);
        textContainer.appendChild(textSubContainer);
        let languages = document.createElement("div");
        languages.classList.add("project-item-languages-container");
        for(let i=0;i<project.languages.length; i++){
            let language = document.createElement("div");
            language.classList.add("project-item-language-container");
            let logo = document.createElement("img");
            logo.classList.add("project-item-language-logo");
            logo.src = "/public/assets/images/icon/languages/"+project.languages[i].logo;
            language.appendChild(logo);
            let div = document.createElement("div");
            div.classList.add("project-item-language-infobulle");
            div.appendChild(document.createTextNode(project.languages[i].name));
            language.appendChild(div);
            languages.appendChild(language);
        }
        textContainer.appendChild(languages);
    item.appendChild(textContainer);
    item.addEventListener("click", function(e){
        clickOnProject(project, e);
    });
    return item;
}

function clickOnProject(project, event){
    let clickY = event.clientY;
    let clickX = event.clientX;
    let popup = document.createElement("div");
    popup.id = "project-popup";
    popup.style.top = clickY+"px";
    popup.style.left = clickX + "px";
    popup.style.borderRadius = "100%";

    setTimeout(function(){
        popup.style.top = "0";
        popup.style.left = "0";
        popup.style.width = "100%";
        popup.style.height = "100%";
        popup.style.borderRadius = "0";
        body.classList.add("overflow-hidden");

        setTimeout(function(){
            let subContainer = document.createElement("div");
            subContainer.classList.add("project-popup-sub-container");

            let crossContainer = document.createElement("div");
            crossContainer.id = "cross-container";
            popup.appendChild(crossContainer);
            crossContainer.style.animation = "opacity 0.3s linear forwards";

            buildProjectInPopup(project, subContainer);
            popup.appendChild(subContainer);
            subContainer.style.animation = "opacity 0.3s linear forwards";
            popup.classList.add("overflow-auto");
            crossContainer.addEventListener("click", function(){
                crossContainer.style.animation = "opacityInverted 0.3s linear forwards";
                subContainer.style.animation = "opacityInverted 0.3s linear forwards";
                popup.classList.remove("overflow-auto");
                popup.classList.add("overflow-hidden");
                setTimeout(function(){
                    popup.style.top = clickY+"px";
                    popup.style.left = clickX + "px";
                    popup.style.width = "0";
                    popup.style.height = "0";
                    popup.style.borderRadius = "100%";
                    body.classList.remove("overflow-hidden");
                    setTimeout(function(){
                        body.removeChild(popup);
                    }, 300);
                }, 300);
            });
        }, 300);
    }, 50);

    body.appendChild(popup);
}

function buildProjectInPopup(project, container){
    let subContainer = document.createElement("div");
    subContainer.id = "popup-sub-container";

    let leftContainer = document.createElement("div");
    leftContainer.id = "popup-left-container";
        let pictureContainer = document.createElement("div");
        pictureContainer.id = "popup-picture-container";
        pictureContainer.style.backgroundColor = "#"+project.backgroundColor;
            let picture = document.createElement("img");
            picture.src = "/public/assets/images/projects/"+project.logo;
        pictureContainer.appendChild(picture);
    leftContainer.appendChild(pictureContainer);
        let linksContainer = document.createElement("div");
        linksContainer.id = "popup-links-container";
            for(let i = 0;i<project.links.length;i++){
                let link = document.createElement("a");
                link.classList.add("popup-link");
                link.href = project.links[i].link;
                link.target = "_blank";
                let pic = document.createElement("img");
                pic.classList.add("popup-link-picture");
                pic.src = "/public/assets/images/icon/links/"+project.links[i].logo;
                link.appendChild(pic);
                let div = document.createElement("div");
                div.classList.add("project-item-language-infobulle");
                div.appendChild(document.createTextNode(project.links[i].name));
                link.appendChild(div);
                linksContainer.appendChild(link);
            }
    leftContainer.appendChild(linksContainer);
    let rightContainer = document.createElement("div");
    rightContainer.id = "popup-right-container";
        let h1 = document.createElement("h1");
        h1.id = "popup-title";
        h1.appendChild(document.createTextNode(project.name));
    rightContainer.appendChild(h1);
        let textContainer = document.createElement("div");
        textContainer.id = "popup-text";
        textContainer.innerHTML = project.description;
    rightContainer.appendChild(textContainer);
        let languagesContainer = document.createElement("div");
        languagesContainer.id = "popup-languages-container";
        for(let i = 0;i<project.languages.length;i++){
            let language = document.createElement("div");
            language.classList.add("popup-language-container");
                let pictureContainer = document.createElement("div");
                pictureContainer.classList.add("popup-language-picture-container");
                let picture = document.createElement("img");
                picture.src = "/public/assets/images/icon/languages/"+project.languages[i].logo;
                pictureContainer.appendChild(picture);
                let languageName = document.createElement("div");
                languageName.classList.add("popup-language-name");
                languageName.appendChild(document.createTextNode(project.languages[i].name));
            language.appendChild(pictureContainer);
            language.appendChild(languageName);
            languagesContainer.appendChild(language);
        }
    rightContainer.appendChild(languagesContainer);
    subContainer.appendChild(leftContainer);
    subContainer.appendChild(rightContainer);
    container.appendChild(subContainer);

}

function displayMore(){
    let delay = 0;
    for(let i = numberProjectsToDisplay; i<projects.length; i++){
        let project = buildProject(projects[i]);
        projectsContainer.append(project);
        project.style.animation = "opacity 0.4s linear forwards "+delay+"s";
        delay += 0.4;
    }
}

function displayLess(){
    let projectsToRemove = document.querySelectorAll(".project-item");
    let delay = 0;

    for(let i = projects.length-1; i>numberProjectsToDisplay-1; i--){
        projectsToRemove[i].style.animation = "";
        projectsToRemove[i].style.opacity = "1";
        projectsToRemove[i].addEventListener("animationend", function(){
            projectsToRemove[i].parentNode.removeChild(projectsToRemove[i]);
        });
        projectsToRemove[i].style.animation = "opacityInverted 0.4s linear forwards " + delay + "s";
        delay+=0.4;
    }
}

function projectsScroll(){
    projectsDisplayOffset = projectsAnchor.offsetTop;
    if(window.pageYOffset >= (projectsDisplayOffset-(window.innerHeight/2)) && projectsLoaded === false) {
        projectsLoaded = true;
        displayOneAfterOther(document.querySelectorAll(".project-item"), "opacity 0.4s linear forwards", 0.5, true, false);

        if(projects.length > numberProjectsToDisplay){
            let buttonMore = document.createElement("div");
            buttonMore.classList.add("more-button");

            projectsAnchor.appendChild(buttonMore);

            buttonMore.addEventListener("click", function(){
                if(buttonMore.classList.contains("more-button")){
                    displayMore();
                    buttonMore.classList.remove("more-button");
                    buttonMore.classList.add("less-button");
                }else{
                    displayLess();
                    buttonMore.classList.add("more-button");
                    buttonMore.classList.remove("less-button");
                }
            });
        }
    }
}
