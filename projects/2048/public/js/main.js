let grille = [];
let scoreNumber;

let blackContainer;
let buttonRefresh;
let score;

let xDown = null;
let yDown = null;

(function () {
    scoreNumber = document.getElementById("scoreNumber");

    blackContainer = document.getElementById("black-container");
    buttonRefresh = document.getElementById("refresh-game");
    buttonRefresh.addEventListener("click", clickOnRefresh);
    score = document.getElementById("score");

    window.addEventListener("resize", function(){
        setSize();
    });
    setSize();

    launchGame();
})();

function launchGame(){
    for(let i=0;i<=3;i++){
        grille[i] = [];
        for(let j=0;j<=3;j++){
            grille[i][j] = new ACase();
        }
    }
    InsertValue(2, getEmptyCase());
    InsertValue(2, getEmptyCase());
    displayGrid();
    document.addEventListener('touchstart', function(e){
        xDown = e.touches[0].clientX;
        yDown = e.touches[0].clientY;
    });
    document.addEventListener('touchmove', swipeGesture, false);
}

function setSize(){
    let x = window.innerWidth;
    let y = window.innerHeight;
    let max = y;
    if(x < y)
        max = x;
    game.style.width = max+"px";
    game.style.height = max+"px";
}

function removeClass(theCase, notThis){
    for(let i=4;i<= 2048;i+=i){
        if(notThis !== "case"+i){
            theCase.classList.remove("case"+i);
        }
    }
}

function displayGrid(){
	let cases = document.querySelectorAll(".case");
	for(let i=0;i<16;i++){
		cases[i].classList.remove("rouge");
		let caseNumber = Math.floor(i/4);
		cases[i].innerText = grille[caseNumber][i%4].value;
        if(grille[caseNumber][i%4].value === 4){
            cases[i].classList.add("case4");
            removeClass(cases[i], "case4");
        }else if(grille[caseNumber][i%4].value===8){
            cases[i].classList.add("case8");
            removeClass(cases[i], "case8");
        }else if(grille[caseNumber][i%4].value===16){
            cases[i].classList.add("case16");
            removeClass(cases[i], "case16");
        }else if(grille[caseNumber][i%4].value===32){
            cases[i].classList.add("case32");
            removeClass(cases[i], "case32");
        }else if(grille[caseNumber][i%4].value===64){
            cases[i].classList.add("case64");
            removeClass(cases[i], "case64");
        }else if(grille[caseNumber][i%4].value===128){
            cases[i].classList.add("case128");
            removeClass(cases[i], "case128");
        }else if(grille[caseNumber][i%4].value===256){
            cases[i].classList.add("case256");
            removeClass(cases[i], "case256");
        }else if(grille[caseNumber][i%4].value===512){
            cases[i].classList.add("case512");
            removeClass(cases[i], "case512");
        }else if(grille[caseNumber][i%4].value===1024){
            cases[i].classList.add("case1024");
            removeClass(cases[i], "case1024");
        }else if(grille[caseNumber][i%4].value >= 2048){
            cases[i].classList.add("case2048");
            removeClass(cases[i], "case2048");
        }else{
            removeClass(cases[i], null);
        }
		if(grille[Math.floor(i/4)][i%4].lastInsert){
			cases[i].classList.add("rouge");
			grille[Math.floor(i/4)][i%4].lastInsert = false;
		}

	}
}

function getEmptyCase(){
    let isACaseDispo = false;
    for(let i=0;i<=3;i++){
        for(let j=0;j<=3;j++){
            if(grille[i][j].value === ""){
                isACaseDispo = true;
                break;
            }
        }
    }
    if(!isACaseDispo){
        return  new Coordinates(-1,-1);
    }

	let newRandom1;
	let newRandom2;
	do{
		newRandom1 = getRandomInt(4);
		newRandom2 = getRandomInt(4);
	}while(grille[newRandom1][newRandom2].value !== "");
	return new Coordinates(newRandom1,newRandom2);
}

function getNewValue(){
    let rand = getRandomInt(8);
    if(rand === 0)
        return 4;
    return 2;
}

function actionClavier(e){
	switch(e.key){
		case "ArrowUp" : moveUp(); break;
		case "ArrowDown" : moveDown(); break;
		case "ArrowRight" : moveRight(); break;
		case "ArrowLeft" : moveLeft(); break;
	}
}

function swipeGesture(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }
    let xUp = evt.touches[0].clientX;
    let yUp = evt.touches[0].clientY;
    let xDiff = xDown - xUp;
    let yDiff = yDown - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
            moveLeft();
        } else {
            moveRight();
        }
    } else {
        if ( yDiff > 0 ) {
            moveUp();
        } else {
            moveDown()
        }
    }
    xDown = null;
    yDown = null;
}

function moveUp(){
	//i : colonne
	//j : ligne
    let isAMove = false;
	for(let i=0;i<=3;i++){
		for(let j=1;j<=3;j++){
			if(grille[j][i].value !== ""){
				let k = j;
				while(k > 0 && (grille[k-1][i].value === grille[j][i].value || grille[k-1][i].value === "")){
					k--;
				}
				if(grille[k][i].value === ""){
					switchValue(grille[k][i], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}else if(grille[k][i].value === grille[j][i].value  && k !== j){
					addValue(grille[k][i], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}
				
			}
		}
	}
    if(isAMove)
        afterMove();
}

function afterMove(){
    let theCase = getEmptyCase();
    if(theCase.x !== -1){
        InsertValue(getNewValue(), theCase);
        displayGrid();
        checkFinished();
    }
}

function moveDown(){
	//i : colonne
	//j : ligne
    let isAMove = false;
	for(let i=3;i>=0;i--){
		for(let j=2;j>=0;j--){
			if(grille[j][i].value !== ""){
				let k = j;
				while(k < 3 && (grille[k+1][i].value === grille[j][i].value || grille[k+1][i].value === "")){
					k++;
				}
				if(grille[k][i].value === ""){
					switchValue(grille[k][i], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}else if(grille[k][i].value === grille[j][i].value && k !== j){
					addValue(grille[k][i], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}
				
			}
		}
	}
    if(isAMove)
        afterMove();
}

function moveLeft(){
    //i : colonne
    //j : ligne
    let isAMove = false;
    for(let i=1;i<=3;i++){
        for(let j=0;j<=3;j++){
            if(grille[j][i].value !== ""){
                let k = i;
                while(k > 0 && (grille[j][k-1].value === grille[j][i].value || grille[j][k-1].value === "")){
                    k--;
                }
                if(grille[j][k].value === ""){
                    switchValue(grille[j][k], grille[j][i]);
                    emptyCase(grille[j][i]);
                    isAMove = true;
                }else if(grille[j][k].value === grille[j][i].value && k !== i){
                    addValue(grille[j][k], grille[j][i]);
                    emptyCase(grille[j][i]);
                    isAMove = true;
                }

            }
        }
    }
    if(isAMove)
        afterMove();
}

function moveRight(){
	//i : colonne
	//j : ligne
    let isAMove = false;
	for(let i=3;i>=0;i--){
		for(let j=3;j>=0;j--){
			if(grille[j][i].value !== ""){
				let k = i;
				while(k < 3 && (grille[j][k+1].value === grille[j][i].value || grille[j][k+1].value === "")){
					k++;
				}
				if(grille[j][k].value === ""){
					switchValue(grille[j][k], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}else if(grille[j][k].value === grille[j][i].value && k !== i){
					addValue(grille[j][k], grille[j][i]);
					emptyCase(grille[j][i]);
					isAMove = true;
				}
				
			}

		}
	}
    if(isAMove)
        afterMove();
}

function checkFinished(){
    //i = ligne;
    //j = colonne;
    //parcours 1 ligne jusqua 3 ligne colonne 1 jusqua 3 colonne
    //parcours
    if(grille[0][0].value === "")
        return;
    for(let i=0;i<4;i++){
        for(let j=0;j<4;j++){
            if(j !== 3){
                if(grille[i][j].value === grille[i][j+1].value || grille[i][j+1].value === "")
                    return;
            }
            if(i !== 3){
                if(grille[i][j].value === grille[i+1][j].value || grille[i+1][j].value === "")
                    return;
            }
        }
    }
    displayEnd();
}

function switchValue(case1, case2){
	case1.value = case2.value;
}

function emptyCase(ACase){
	ACase.value = "";
}

function addValue(case1, case2){
    let value = parseInt(case1.value)+parseInt(case2.value);
    scoreNumber.innerText = parseInt(scoreNumber.innerText)+value;

	case1.value = value;
}

function ACase(){
	this.value = "";
	this.lastInsert = false;
}

function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

function InsertValue(value, coordinates){
	grille[coordinates.x][coordinates.y].value = value;
	grille[coordinates.x][coordinates.y].lastInsert = true;
}

function Coordinates(x,y){
	this.x = x;
	this.y = y;
}

function displayEnd(){
    document.removeEventListener("keydown", actionClavier);
    score.classList.add("z-index12");
    blackContainer.removeEventListener("animationend", blackContainerEventHide);
    blackContainer.classList.remove("display-none");
    blackContainer.style.animation = "opacityShow 0.1s linear forwards";
}

function blackContainerEventHide(){
    blackContainer.classList.add("display-none");
}

function clickOnRefresh(){
    grille = [];

    scoreNumber.innerText = 0;

    let cases = document.querySelectorAll(".case");
    for(let i=0;i<16;i++){
        cases[i].className = "";
        cases[i].classList.add("case")
    }

    launchGame();
    score.classList.remove("z-index12");
    blackContainer.addEventListener("animationend", blackContainerEventHide);
    blackContainer.style.animation = "opacityHide 0.1s linear forwards";
}
