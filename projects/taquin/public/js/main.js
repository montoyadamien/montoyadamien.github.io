let casesHtml;
let cases = [];
let score;
let caseSize;
let game;

(function(){
    game = document.getElementById("game");
    score = document.getElementById("scoreNumber");
    casesHtml = document.querySelectorAll("div.case");
    window.addEventListener("resize", function(){
       setSize();
    });
    setSize();
    let array = [];

    for(let i=0;i<3;i++){
        for(let j=0;j<3;j++){
            let index = i + (2*i+j);

            if(index !== 8){
                let num;
                do{
                    num = getRandomInt(8);
                }while(array.indexOf(num) !== -1);
                array.push(num);
                casesHtml[index].innerText = num;
                cases.push(num);
                casesHtml[index].addEventListener("click", selection);
            }else{
                cases.push(-1);
            }
            casesHtml[index].style.top = i * caseSize+"px";
            casesHtml[index].style.left = j%3 * caseSize+"px";

        }
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
    caseSize = (max/3)-0.7;

    if(cases.length === 9){
        for(let i=0; i<9;i++){
            casesHtml[i].style.transition = "0s";
        }

        for(let i=0;i<3;i++) {
            for (let j=0;j<3; j++) {
                let index = i + (2 * i + j);

                for(let k = 0; k<9; k++){
                    if(parseInt(casesHtml[k].innerText) === cases[index] || (casesHtml[k].innerText === "" && cases[index] === -1)){
                        casesHtml[k].style.top = i * caseSize+"px";
                        casesHtml[k].style.left = j%3 * caseSize+"px";
                    }
                }
            }
        }

        for(let i=0; i<9;i++){
            casesHtml[i].style.transition = "";
        }
    }
}

function checkEnd(){
    for(let i=0;i<cases.length-1;i++){
        if(parseInt(cases[i]) !== i+1)
            return;
    }
    displayEnd();
}

function displayEnd(){
    for(let i=0;i<casesHtml.length;i++){
        casesHtml[i].removeEventListener("click", selection);
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
    let indiceTarget = cases.indexOf(parseInt(e.currentTarget.innerText));
    let indiceCaseVide = cases.indexOf(-1);

	if(indiceTarget%3 === 0){
		gauche = true;
	}else if(indiceTarget%3 === 2)
		droit = true;

	if(indiceTarget-3 === indiceCaseVide || indiceTarget+3 === indiceCaseVide ||
		(indiceTarget-1 === indiceCaseVide && !gauche) || (indiceTarget+1 === indiceCaseVide && !droit))	{

        createAudio();

        score.innerText = parseInt(score.innerText) + 1;

		let temporary = cases[indiceTarget];
		cases[indiceTarget] = -1;
		cases[indiceCaseVide] = temporary;

		let caseVide = document.getElementsByClassName("vide")[0];
		let currentCase = e.currentTarget;

		let topTemp = currentCase.style.top;
		let topLeft = currentCase.style.left;

        currentCase.style.top = caseVide.style.top;
        currentCase.style.left = caseVide.style.left;

        caseVide.style.top = topTemp;
        caseVide.style.left = topLeft;
	}
    checkEnd();
}

function createAudio(){
    let audio = document.createElement("audio");
    audio.src = "./public/sounds/tile_movement.mp3";
    audio.addEventListener("ended", function(e){
       e.target.remove();
    });
    audio.play();
    document.body.appendChild(audio);
}

function displayGrid(){
    console.log(cases[0] + " - " + cases[1] + " - " + cases[2]);
    console.log(cases[3] + " - " + cases[4] + " - " + cases[5]);
    console.log(cases[6] + " - " + cases[7] + " - " + cases[8]);
    console.log("---------");
}
