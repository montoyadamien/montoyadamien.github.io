let divs;
let score;


(function(){
    let game = document.getElementById("game");
    score = document.getElementById("scoreNumber");
    divs = document.querySelectorAll("div.case");
    window.addEventListener("resize", function(){
       setSize();
    });
    setSize();
    let array = [];
    for(let i=0;i<divs.length;i++){
        if(i !== divs.length-1){
            let num;
            do{
                num = getRandomInt(8);
            }while(array.indexOf(num) !== -1);
            array.push(num);
            divs[i].innerText = num;
        }
        divs[i].addEventListener("click", selection);
    }
    checkEnd();
})();

function setSize(){
    let x = window.innerWidth;
    let y = window.innerHeight;
    let max = y;
    if(x < y)
        max = x;
    game.style.width = max+"px";
    game.style.height = max+"px";
}

function checkEnd(){
    for(let i=0;i<divs.length-1;i++){
        if(parseInt(divs[i].innerText) !== i+1)
            return;
    }
    displayEnd();
}

function displayEnd(){
    for(let i=0;i<divs.length;i++){
        divs[i].removeEventListener("click", selection);
    }
    let body = document.body;
    let div = document.createElement("div");
    div.id="endGame";
    div.appendChild(document.createTextNode("Partie terminée !"));
    body.appendChild(div);
}

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max)) + 1;
}

function selection(e){
	let gauche = false;
	let droit = false;
    let indiceTarget = 0;
    let indiceCaseVide = 0;
    let caseVide = document.querySelector("div.vide");
	for(let i=0;i<divs.length;i++){
		if(divs[i] === caseVide)
			indiceCaseVide = i;
		if(e.currentTarget === divs[i])
			indiceTarget = i;
	}

	if(indiceTarget%3 === 0){
		gauche = true;
	}else if(indiceTarget%3 === 2)
		droit = true;

	if(divs[indiceTarget-3] === caseVide||
		divs[indiceTarget+3] === caseVide ||
		(divs[indiceTarget-1] === caseVide && !gauche) ||
		(divs[indiceTarget+1] === caseVide && !droit))	{
        score.innerText = parseInt(score.innerText) + 1;
		let temporary = divs[indiceCaseVide].innerHTML;
		divs[indiceCaseVide].innerHTML = divs[indiceTarget].innerHTML;
		divs[indiceTarget].innerHTML = temporary;
		divs[indiceTarget].classList.add("vide");
		divs[indiceCaseVide].classList.remove("vide");
	}
    checkEnd();
}