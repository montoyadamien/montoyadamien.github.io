let skills = [];
let skillsElement = [];
let skillsDisplayOffset = 0;
let skillsDisplayed = false;

(function(){
    skillsDisplayOffset = skillsAnchor.offsetTop;

    skills = ["Java - Java Android", "PHP", "JavaScript - jQuery", "HTML - CSS - Bootstrap", "MySQL - PostgreSQL - PL/SQL", "C", "Python", "Bash", "IntelliJ", "Unity", "Git", "Photoshop", "Suite office", "Windows - Linux - Mac OS X"];
    buildSkill();

    window.addEventListener("scroll", function(){
        if(window.pageYOffset >= (skillsDisplayOffset-(window.innerHeight/2)) && skillsDisplayed === false){
            skillsDisplayed = true;
            let i = 0;
            while(i<skillsElement.length){
                setSkillListenerOpen(skillsElement[i], i);
                i++;
            }
        }
    });
})();

function setSkillListenerOpen(object, delay){
    object.style.animation = "skillsPop 0.6s "+(delay/8)+"s";
    object.addEventListener("animationend", animationSkillOpenEvent);
}

function animationSkillOpenEvent(e){
    e.target.removeEventListener("animationend", animationSkillOpenEvent);
    e.target.style.transform = "rotate(-45deg) translate(0, -25%)";
    e.target.style.animation = "";
}

function buildSkill(){
    for(let i=0;i<skills.length;i++){
        let div = document.createElement("div");
        div.classList.add("skill");
        let square = document.createElement("div");
        square.classList.add("skillSquare");
        div.appendChild(square);
        let skillSquareFill = document.createElement("div");
        skillSquareFill.classList.add("skillSquareFill");
        square.appendChild(skillSquareFill);
        skillsElement.push(skillSquareFill);

        let skillText = document.createElement("div");
        skillText.classList.add("skillText");
        skillText.appendChild(document.createTextNode(skills[i]));
        div.appendChild(skillText);

        skillsAnchor.appendChild(div);
    }
}
