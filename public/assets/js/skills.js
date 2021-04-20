let skills = [];
let skillsLoaded = false;
let skillsDisplayOffset = 0;
let CATEGORY_DEV = 0;
let CATEGORY_TOOL = 1;
let CATEGORY_DATABASE = 2;
let CATEGORY_OTHER = 3;

let languagesContainer = document.getElementById("skills-language-container");
let databaseContainer = document.getElementById("skills-database-container");
let toolsContainer = document.getElementById("skills-tools-container");
let othersContainer = document.getElementById("skills-other-container");

class Skill {
    constructor(name, logo, category) {
        this.name = name;
        if (category === CATEGORY_DEV) {
            this.logo = "public/assets/images/icon/languages/" + logo + ".png";
        } else if (category === CATEGORY_TOOL) {
            this.logo = "public/assets/images/icon/tools/" + logo + ".png";
        } else if (category === CATEGORY_DATABASE) {
            this.logo = "public/assets/images/icon/database/" + logo + ".png";
        } else if (category === CATEGORY_OTHER) {
            this.logo = "public/assets/images/icon/other/" + logo + ".png";
        }
        this.category = category;
    }
}

(function(){
    pushSkills();
    displaySkills();
    skillsScroll();
    window.addEventListener("scroll", function(){
        skillsScroll();
    });
})();

function pushSkills() {
    skills.push(new Skill("Android (Java)","android", CATEGORY_DEV ));
    skills.push(new Skill( "Angular (Framework JS)", "angular", CATEGORY_DEV));
    skills.push(new Skill( "C", "c", CATEGORY_DEV));
    skills.push(new Skill( "C++", "cpp", CATEGORY_DEV));
    skills.push(new Skill( "C#", "csharp", CATEGORY_DEV));
    skills.push(new Skill( "Flutter (Dart)", "flutter", CATEGORY_DEV));
    skills.push(new Skill( "Go", "go", CATEGORY_DEV));
    skills.push(new Skill( "Java", "java", CATEGORY_DEV));
    skills.push(new Skill( "JavaScript", "javascript", CATEGORY_DEV));
    skills.push(new Skill( "jQuery", "jquery", CATEGORY_DEV));
    skills.push(new Skill( "NestJS (Framework JS)", "nestjs", CATEGORY_DEV));
    skills.push(new Skill( "PHP", "php", CATEGORY_DEV));
    skills.push(new Skill( "Python", "python", CATEGORY_DEV));
    skills.push(new Skill( "React Native (Framework JS)", "react_native", CATEGORY_DEV));
    skills.push(new Skill( "Spring (Framework Java)", "spring", CATEGORY_DEV));
    skills.push(new Skill( "Symfony (Framework PHP)", "symfony", CATEGORY_DEV));

    skills.push(new Skill( "MongoDB", "mongodb", CATEGORY_DATABASE));
    skills.push(new Skill( "MySQL", "mysql", CATEGORY_DATABASE));
    skills.push(new Skill( "PostgreSQL", "postgresql", CATEGORY_DATABASE));
    skills.push(new Skill( "Redis", "redis", CATEGORY_DATABASE));

    skills.push(new Skill( "Bitbucket", "bitbucket", CATEGORY_TOOL));
    skills.push(new Skill( "CircleCI", "circleci", CATEGORY_TOOL));
    skills.push(new Skill( "Docker", "docker", CATEGORY_TOOL));
    skills.push(new Skill( "Google App Engine (Cloud tasks, task queues, base de données...)", "google_app_engine", CATEGORY_TOOL));
    skills.push(new Skill( "GitHub", "github", CATEGORY_TOOL));
    skills.push(new Skill( "Jenkins", "jenkins", CATEGORY_TOOL));
    skills.push(new Skill( "SonarQube", "sonarqube", CATEGORY_TOOL));
    skills.push(new Skill( "Travis", "travis", CATEGORY_TOOL));

    skills.push(new Skill( "Eclipse", "eclipse", CATEGORY_OTHER));
    skills.push(new Skill( "IntelliJ", "intellij", CATEGORY_OTHER));
    skills.push(new Skill( "Linux (Ubuntu, Debian)", "linux", CATEGORY_OTHER));
    skills.push(new Skill( "MacOS", "macos", CATEGORY_OTHER));
    skills.push(new Skill( "Photoshop", "photoshop", CATEGORY_OTHER));
    skills.push(new Skill( "Visual Studio Code", "vscode", CATEGORY_OTHER));
    skills.push(new Skill( "Windows", "windows", CATEGORY_OTHER));
}

function skillsScroll(){
    skillsDisplayOffset = skillsAnchor.offsetTop;
    if(window.pageYOffset >= (skillsDisplayOffset-(window.innerHeight/2)) && skillsLoaded === false){
        skillsLoaded = true;
        if (window.innerWidth < 500) {
            document.getElementById("skill-background-shape").style.animation = "skills-background 5s linear 0.5s forwards";
        } else if (window.innerWidth < 1000) {
            document.getElementById("skill-background-shape").style.animation = "skills-background 10s linear 0.5s forwards";
        } else if (window.innerWidth < 2000) {
            document.getElementById("skill-background-shape").style.animation = "skills-background 15s linear 0.5s forwards";
        } else {
            document.getElementById("skill-background-shape").style.animation = "skills-background 20s linear 0.5s forwards";
        }
    }
}

function displaySkills(){
    skills.forEach(skill => {
        let item = document.createElement("div");
        item.classList.add("skill-item");

        let container = document.createElement("div");
        container.classList.add("skill-item-container");
        item.appendChild(container);

        let pic = document.createElement("img");
        pic.alt = skill.name;
        pic.classList.add("skill-item-picture");
        pic.src = skill.logo;
        item.appendChild(pic);

        let infobulle = document.createElement("div");
        infobulle.classList.add("skill-item-infobulle");
        if (skill.name.length > 20) {
            infobulle.classList.add("big-infobulle");
        }
        infobulle.appendChild(document.createTextNode(skill.name));
        item.appendChild(infobulle);

        if (skill.category === CATEGORY_DEV) {
            languagesContainer.appendChild(item);
        } else if (skill.category === CATEGORY_DATABASE) {
            databaseContainer.appendChild(item);
        } else if (skill.category === CATEGORY_TOOL) {
            toolsContainer.appendChild(item);
        } else if (skill.category === CATEGORY_OTHER) {
            othersContainer.appendChild(item);
        }
    });
}
