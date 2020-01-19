let skill = [];
let skillsLabel = ["Java - Android", "Flutter React Native",
    "PHP - Symfony", "JS - jQuery - Angular", "NestJS", "HTML CSS Bootstrap",
    "MySQL PostgreSQL PL/SQL", "C - C++ - Python", "Bash", "IntelliJ Eclipse",
    "Unity", "Git", "Photoshop", "Windows - Linux - Mac"];
let skillDisplayed = 0;
let skillXBase = skillsAnchor.clientWidth/2;
let skillYBase = skillsAnchor.clientHeight/2;
let skillDisplayInterval;
let skillsLoaded = false;
let skillsDisplayOffset = 0;

class Skill{
    constructor(name, x, y, container, directionX, directionY) {
        skill.push(this);
        this.container = container;
        this.speed = skillsAnchor.clientWidth/150;
        this.direction = [directionX, directionY];
        this.firstLaunch = true;
        this.elementHtml = document.createElement("div");
        this.elementHtml.classList.add("skill-item");
        let div = document.createElement("div");
        div.classList.add("skill-item-text");
        div.appendChild(document.createTextNode(name));
        this.elementHtml.appendChild(div);
        container.appendChild(this.elementHtml);
        this.size = this.elementHtml.clientWidth;
        this.setPosition(x-this.size/2, y-this.size/2); //to center
        this.calculateFirstDirection();
    }
    setPosition(x, y){
        this.x = x;
        this.y = y;
        this.elementHtml.style.left = x+"px";
        this.elementHtml.style.top = y+"px";
    }
    calculateFirstDirection(){
        let t = this;
        setInterval(function(){
            if(t.firstLaunch){
                t.moveSkillFirstTime();
            }else {
                t.moveSkill();
            }
        }, 200);

    }
    moveSkillFirstTime(){
        this.firstLaunch = false;
        this.x = this.x+(this.direction[0]*this.speed*10);
        this.y = this.y+(this.direction[1]*this.speed*10);
        this.elementHtml.style.left = this.x+"px";
        this.elementHtml.style.top = this.y+"px";
        this.elementHtml.style.transition = "0.5s ease-out";
        this.moveSkill();
    }
    moveSkill(){
        this.elementHtml.style.transition = "0.2s linear";
        this.x = this.x+(this.direction[0]*this.speed);
        this.y = this.y+(this.direction[1]*this.speed);
        this.elementHtml.style.left = this.x+"px";
        this.elementHtml.style.top = this.y+"px";
        if(this.x <= 0 || this.x+this.size >= this.container.clientWidth){
            this.direction[0] *= -1;
        }
        if(this.y <= 0 || this.y+this.size >= this.container.clientHeight){
            this.direction[1] *= -1;
        }
    }
}

(function(){
    skillsScroll();
    window.addEventListener("scroll", function(){
        skillsScroll();
    });
})();

function skillsScroll(){
    skillsDisplayOffset = skillsAnchor.offsetTop;
    if(window.pageYOffset >= (skillsDisplayOffset-(window.innerHeight/2)) && skillsLoaded === false){
        skillsLoaded = true;
        setTimeout(function(){
            skillDisplayInterval = setInterval(displaySkill, 500);
        }, 2000);
        skillsAnchor.style.animation = "skills-batman 5.5s linear 1s forwards";
    }
}

function displaySkill(){
    new Skill(skillsLabel[skillDisplayed], skillXBase, skillYBase, skillsAnchor, Math.cos(2 * Math.PI * skillDisplayed / (skillsLabel.length-2) + 0.2), Math.sin(2 * Math.PI * skillDisplayed / (skillsLabel.length-1)) + 0.2);
    skillDisplayed++;
    if(skillDisplayed > skillsLabel.length-1){
        clearInterval(skillDisplayInterval);
        let skills_title = document.getElementById("skills-title");
        skills_title.style.animation = "opacity 1s linear 2s forwards";
    }
}
