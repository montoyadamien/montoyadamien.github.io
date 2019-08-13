let COLORWHITE = "white";
let COLORBLACK = "black";
let VALUEDAME = "dame";
let VALUEPAWN = "pawn";
let pawnsHtml = [];
let sizeOfCase;
let gamePawns;
let casesHtml = [];
let pawns = [];
let playerColorHtml;
let selectedXYPawn = [];
let actualPlayerColor;
let minutesSpan;
let secondsSpan;
let timer;
let lineContainer;

let blackContainer;
let buttonRefresh;
let score;

function setSize(){
    let x = window.innerWidth;
    let y = window.innerHeight;
    let max = y;
    if(x < y)
        max = x;
    game.style.width = max+"px";
    game.style.height = max+"px";
    sizeOfCase = max/10;

    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(pawnsHtml[i][j] !== undefined && pawnsHtml[i][j] !== ""){
                pawnsHtml[i][j].style.top = i*sizeOfCase+"px";
                pawnsHtml[i][j].style.left = j*sizeOfCase+"px";
            }
        }
    }
}

(function(){
    lineContainer = document.getElementById("lineContainer");
    gamePawns = document.getElementById("gamePawns");
    playerColorHtml = document.getElementById("playerColor");
    minutesSpan = document.getElementById("minutes");
    secondsSpan = document.getElementById("seconds");

    blackContainer = document.getElementById("black-container");
    buttonRefresh = document.getElementById("refresh-game");
    buttonRefresh.addEventListener("click", clickOnRefresh);
    score = document.getElementById("score");

    launchGame();
})();


function launchGame(){
    for(let i=0;i<10;i++){
        pawnsHtml[i] = [];
        pawns[i] = [];
        casesHtml[i] = [];
        for(let j=0;j<10;j++){
            pawnsHtml[i][j] = "";
            pawns[i][j] = "";
            casesHtml[i][j] = "";
        }
    }

    for(let i=0;i<10;i++){
        let line = document.createElement("div");
        line.classList.add("line");
        for(let j=0;j<10;j++){
            let aCase = document.createElement("div");
            aCase.classList.add("case");
            if((i+j)%2 === 0)
                aCase.classList.add("backgroundWhite");
            else{
                aCase.classList.add("backgroundBlack");
                if(i<4 || i >5){
                    let pawn = document.createElement("div");
                    pawn.classList.add("pawn");
                    if(i<4){
                        pawn.classList.add("backgroundBlackPawn");
                        pawns[i][j] = new Pawn(COLORBLACK, VALUEPAWN);
                    }else if(i>5){
                        pawn.classList.add("backgroundWhitePawn");
                        pawns[i][j] = new Pawn(COLORWHITE, VALUEPAWN);
                    }
                    pawn.style.top = i*sizeOfCase+"px";
                    if(j%2 === 0)
                        pawn.style.left = ((j%2)+j)*sizeOfCase+"px";
                    else
                        pawn.style.left = ((j%2)+(j-1))*sizeOfCase+"px";
                    pawnsHtml[i][j] = pawn;
                    gamePawns.appendChild(pawn);
                }
            }
            casesHtml[i][j] = aCase;
            line.appendChild(aCase);
        }
        lineContainer.appendChild(line);
    }

    window.addEventListener("resize", function(){
        setSize();
    });
    setSize();

    let random = getRandomInt(2);
    if(random === 0)
        actualPlayerColor = COLORBLACK;
    else
        actualPlayerColor = COLORWHITE;
    setActualPlayer();
    timer = setInterval(setTimer, 1000);
}

function setActualPlayer(){
    enablePlayerPlay();
    displayActualPlayer()
}

function enablePlayerPlay(){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            let isMovable = false;
            if(pawns[i][j].color === actualPlayerColor){
                let moveLine = -2;
                let moveColumn = -2;
                let moveLineLittle = -1;
                let moveColumnLittle = -1;

                for(let k=0;k<4;k++){
                    if(k===1){
                        moveColumn = 2;
                        moveColumnLittle = 1;
                    }else if(k===2){
                        moveLine = 2;
                        moveLineLittle = 1;
                    }else if(k===3){
                        moveColumn = -2;
                        moveColumnLittle = -1;
                    }
                    if(i+moveLine >= 0 && i+moveLine < 10){
                        if(j+moveColumn >= 0 && j+moveColumn < 10){
                            if(pawns[i+moveLine][j+moveColumn] !== undefined && pawns[i+moveLineLittle][j+moveColumnLittle] !== "" && pawns[i+moveLineLittle][j+moveColumnLittle].color !== pawns[i][j].color){
                                if(pawns[i+moveLine][j+moveColumn] !== undefined && pawns[i+moveLine][j+moveColumn] === ""){
                                    isMovable = true;
                                }
                            }
                        }
                    }
                }

                if(!isMovable){
                    if(pawns[i][j].color === COLORBLACK || pawns[i][j].value === VALUEDAME){
                        if(i+1 < 10){
                            if(j+1<10){
                                if(pawns[i+1][j+1] !== undefined && pawns[i+1][j+1] === ""){
                                    isMovable = true;
                                }
                            }
                            if(j-1>=0){
                                if(pawns[i+1][j-1] !== undefined  && pawns[i+1][j-1] === ""){
                                    isMovable = true;
                                }
                            }
                        }
                    }
                    if(pawns[i][j].color === COLORWHITE || pawns[i][j].value === VALUEDAME){
                        if(i-1 >= 0){
                            if(pawns[i-1][j-1] !== undefined && pawns[i-1][j-1] === ""){
                                isMovable = true;
                            }
                            if(pawns[i-1][j+1] !== undefined && pawns[i-1][j+1] === "")
                                isMovable = true;
                        }
                    }
                }
                if(isMovable){
                    pawnsHtml[i][j].classList.add("cursorPointer");
                    if(pawns[i][j].value === VALUEPAWN)
                        pawnsHtml[i][j].addEventListener("click", pawnClicked);
                    else if(pawns[i][j].value === VALUEDAME)
                        pawnsHtml[i][j].addEventListener("click", dameClicked);
                }
            }
        }
    }
}

function dameClicked(e){
    dameClickedAfter(e.target, false, null, null);
}

function dameClickedAfter(htmlElement,previousEat, incrementLine, incrementColumn){
    removeMovableCase();
    removePawnPoint(false);
    let xy = getXYFromPawn(htmlElement);
    selectedXYPawn = xy;
    let line = xy[0];
    let column = xy[1];
    pawnsHtml[line][column].classList.add("selectedPawn");

    let canMove = false;
    if(previousEat){
        addClickOnMovableCase(casesHtml[line][column]);
        canMove = displayMovableEatableCaseDame(pawns[line][column], line, column, incrementLine, incrementColumn) || canMove;
        let possibleIncrementLine1;
        let possibleIncrementLine2;
        let possibleIncrementColumn1;
        let possibleIncrementColumn2;
        if((incrementLine === -1 && incrementColumn === -1) || (incrementLine === 1 && incrementColumn === 1)){
            possibleIncrementLine1 = -1;
            possibleIncrementColumn1 = 1;
        }else if((incrementLine === -1 && incrementColumn === 1) || (incrementLine === 1 && incrementColumn === -1)){
            possibleIncrementLine1 = -1;
            possibleIncrementColumn1 = -1;
        }
        possibleIncrementLine2 = possibleIncrementLine1*-1;
        possibleIncrementColumn2 = possibleIncrementColumn1*-1;

        getMovablesCaseAfterEat(pawns[line][column], line, column, possibleIncrementLine1, possibleIncrementColumn1);
        getMovablesCaseAfterEat(pawns[line][column], line, column, possibleIncrementLine2, possibleIncrementColumn2);
    }else{
        canMove = displayMovableEatableCaseDame(pawns[line][column], line, column, -1, -1) || canMove;
        canMove = displayMovableEatableCaseDame(pawns[line][column], line, column, -1, 1) || canMove;
        canMove = displayMovableEatableCaseDame(pawns[line][column], line, column, 1, 1) || canMove;
        canMove = displayMovableEatableCaseDame(pawns[line][column], line, column, 1, -1) || canMove;
    }
    if(!canMove){
        endTurn();
    }

}

function getMovablesCaseAfterEat(pawn, lineDepart, columnDepart, incrementLine, incrementColumn){
    if(lineDepart+incrementLine >= 0 && lineDepart+incrementLine <10 && columnDepart+incrementColumn >= 0 && columnDepart+incrementColumn <10){
        if(pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== undefined && pawns[lineDepart+incrementLine][columnDepart+incrementColumn] === ""){
            getMovablesCaseAfterEat(pawn, lineDepart+incrementLine, columnDepart+incrementColumn, incrementLine, incrementColumn);
            return true;
        }else if(lineDepart+(incrementLine*2) >= 0 && lineDepart+(incrementLine*2) <10 && columnDepart+(incrementColumn*2) >= 0 && columnDepart+(incrementColumn*2) <10){
            if(pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== undefined && pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== "" && pawns[lineDepart+incrementLine][columnDepart+incrementColumn].color !== pawn.color){
                if(pawns[lineDepart+(incrementLine*2)][columnDepart+(incrementColumn*2)] === ""){
                    addClickOnEatCaseDame(casesHtml[lineDepart+(incrementLine*2)][columnDepart+(incrementColumn*2)]);
                    return true;
                }
            }
        }
    }
}

function displayMovableEatableCaseDame(pawn, lineDepart, columnDepart, incrementLine, incrementColumn){
    if(lineDepart+incrementLine >= 0 && lineDepart+incrementLine <10 && columnDepart+incrementColumn >= 0 && columnDepart+incrementColumn <10){
        if(pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== undefined && pawns[lineDepart+incrementLine][columnDepart+incrementColumn] === ""){
            addClickOnMovableCase(casesHtml[lineDepart+incrementLine][columnDepart+incrementColumn]);
            displayMovableEatableCaseDame(pawn, lineDepart+incrementLine, columnDepart+incrementColumn, incrementLine, incrementColumn);
            return true;
        }else if(lineDepart+(incrementLine*2) >= 0 && lineDepart+(incrementLine*2) <10 && columnDepart+(incrementColumn*2) >= 0 && columnDepart+(incrementColumn*2) <10){
            if(pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== undefined && pawns[lineDepart+incrementLine][columnDepart+incrementColumn] !== "" && pawns[lineDepart+incrementLine][columnDepart+incrementColumn].color !== pawn.color){
                if(pawns[lineDepart+(incrementLine*2)][columnDepart+(incrementColumn*2)] === ""){
                    addClickOnEatCaseDame(casesHtml[lineDepart+(incrementLine*2)][columnDepart+(incrementColumn*2)]);
                    return true;
                }
            }
        }
    }
    return false;
}

function addClickOnEatCaseDame(caseHtml){
    caseHtml.classList.add("eatableCase");
    caseHtml.addEventListener("click", clickOnEatableCaseDame);
}

function clickOnEatableCaseDame(e){
    let xyCase = getXYFromCase(e.target);
    let lineCase = xyCase[0];
    let columnCase = xyCase[1];

    let incrementLine;
    let incrementColumn;
    let calcLine = lineCase-selectedXYPawn[0];
    let calcColumn = columnCase-selectedXYPawn[1];
    if(calcLine > 0)
        incrementLine = -1;
    else
        incrementLine = +1;
    if(calcColumn > 0)
        incrementColumn = -1;
    else
        incrementColumn = +1;
    let pawnToEatLine = lineCase+incrementLine;
    let pawnToEatColumn = columnCase+incrementColumn;
    let pawnHtmlToEat = pawnsHtml[pawnToEatLine][pawnToEatColumn];

    pawns[lineCase][columnCase] = pawns[selectedXYPawn[0]][selectedXYPawn[1]];
    pawns[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    pawnsHtml[lineCase][columnCase] = pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]];
    pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    pawns[pawnToEatLine][pawnToEatColumn] = "";

    let pawnHtmlSelected = pawnsHtml[lineCase][columnCase];
    movePawnHtmlToCase(pawnHtmlSelected, lineCase, columnCase);

    pawnHtmlToEat.classList.add("eatPawn");
    pawnHtmlToEat.addEventListener("animationend", function(e){
        e.target.parentElement.removeChild(e.target);
        pawnsHtml[pawnToEatLine][pawnToEatColumn] = "";
    });
    removeMovableCase();
    removePawnPoint(true);
    removePawnPointListeners();
    dameClickedAfter(pawnHtmlSelected, true, incrementLine*-1, incrementColumn*-1);


}

function pawnClicked(e){
    pawnClickedAfter(e.target, false);
}

function pawnClickedAfter(htmlElement, previousEat){
    removeMovableCase();
    removePawnPoint(false);
    let xy = getXYFromPawn(htmlElement);
    selectedXYPawn = xy;
    let line = xy[0];
    let column = xy[1];
    pawnsHtml[line][column].classList.add("selectedPawn");
    if(!previousEat)
        displayMovableCase(line, column, pawns[line][column]);
    let eatCase = !displayEatCase(line, column, pawns[line][column], true);
    if(previousEat){
        addClickOnMovableCase(casesHtml[line][column]);
    }
    if(previousEat && eatCase){
        //fi player can't play this turn
        endTurn();
    }
}

function endTurn(){
    removePawnPoint(true);
    removeMovableCase();
    removePawnPointListeners();
    if(!isEnd()){
        invertActualPlayer();
        setActualPlayer();
        enablePlayerPlay();
    }
}

function displayEatCase(line, column, pawn, addListenerOnEat){
    let canEat = false;
    let moveLine = -2;
    let moveColumn = -2;
    let moveLineLittle = -1;
    let moveColumnLittle = -1;

    for(let i=0;i<4;i++){
        if(i===1){
            moveColumn = 2;
            moveColumnLittle = 1;
        }else if(i===2){
            moveLine = 2;
            moveLineLittle = 1;
        }else if(i===3){
            moveColumn = -2;
            moveColumnLittle = -1;
        }
        if(line+moveLine >= 0 && line+moveLine < 10){
            if(column+moveColumn >= 0 && column+moveColumn < 10){
                if(pawns[line+moveLine][column+moveColumn] !== undefined && pawns[line+moveLineLittle][column+moveColumnLittle] !== "" && pawns[line+moveLineLittle][column+moveColumnLittle].color !== pawn.color){
                    if(pawns[line+moveLine][column+moveColumn] !== undefined && pawns[line+moveLine][column+moveColumn] === ""){
                        if(addListenerOnEat){
                            addClickOnEatCase(casesHtml[line+moveLine][column+moveColumn]);
                            canEat = true;
                        }else{
                            addCursorOnEatCase(casesHtml[line+moveLine][column+moveColumn]);
                        }
                    }
                }
            }
        }
    }
    return canEat;
}

function displayMovableCase(line, column, pawn){
    let canMove = false;
    if(pawn.color === COLORBLACK){
        if(pawns[line+1][column+1] !== undefined && pawns[line+1][column+1] === ""){
            addClickOnMovableCase(casesHtml[line+1][column+1]);
            canMove = true;
        }
        if(pawns[line+1][column-1] !== undefined && pawns[line+1][column-1] === ""){
            addClickOnMovableCase(casesHtml[line+1][column-1]);
            canMove = true;
        }
    }else{
        if(pawns[line-1][column+1] !== undefined && pawns[line-1][column+1] === ""){
            addClickOnMovableCase(casesHtml[line-1][column+1]);
            canMove = true;
        }
        if(pawns[line-1][column-1] !== undefined && pawns[line-1][column-1] === ""){
            addClickOnMovableCase(casesHtml[line-1][column-1]);
            canMove = true;
        }
    }
    return canMove;
}

function addClickOnEatCase(caseHtml){
    caseHtml.classList.add("eatableCase");
    caseHtml.addEventListener("click", clickOnEatableCase);
}

function addCursorOnEatCase(caseHtml){
    caseHtml.classList.add("eatableCase");
}

function clickOnEatableCase(e){
    let xyCase = getXYFromCase(e.target);
    let lineCase = xyCase[0];
    let columnCase = xyCase[1];
    let pawnToEatLine = selectedXYPawn[0]+((lineCase-selectedXYPawn[0])/2);
    let pawnToEatColumn = selectedXYPawn[1]+((columnCase-selectedXYPawn[1])/2);
    let pawnHtmlToEat = pawnsHtml[pawnToEatLine][pawnToEatColumn];

    pawns[lineCase][columnCase] = pawns[selectedXYPawn[0]][selectedXYPawn[1]];
    pawns[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    pawnsHtml[lineCase][columnCase] = pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]];
    pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    pawns[pawnToEatLine][pawnToEatColumn] = "";

    let pawnHtmlSelected = pawnsHtml[lineCase][columnCase];

    movePawnHtmlToCase(pawnHtmlSelected, lineCase, columnCase);

    pawnHtmlToEat.classList.add("eatPawn");
    pawnHtmlToEat.addEventListener("animationend", function(e){
        e.target.parentElement.removeChild(e.target);
        pawnsHtml[pawnToEatLine][pawnToEatColumn] = "";
    });
    if(pawns[lineCase][columnCase].value === VALUEPAWN)
        checkIsBecomeDame(pawns[lineCase][columnCase], lineCase, columnCase);
    removeMovableCase();
    removePawnPoint(true);
    removePawnPointListeners();
    pawnClickedAfter(pawnHtmlSelected, true);
}

function checkIsBecomeDame(pawn, line, column){
    if(pawn.value !== VALUEDAME){
        if((line === 0 && pawn.color === COLORWHITE) || (line===9 && pawn.color === COLORBLACK)){
            pawn.value = VALUEDAME;
            if(pawn.color === COLORWHITE)
                pawnsHtml[line][column].classList.add("dameWhite");
            else
                pawnsHtml[line][column].classList.add("dameBlack");
        }

    }
}

function addClickOnMovableCase(caseHtml){
    caseHtml.classList.add("movableCase");
    caseHtml.addEventListener("click", clickOnMovableCase);
}

function clickOnMovableCase(e){
    let xyCase = getXYFromCase(e.target);
    let lineCase = xyCase[0];
    let columnCase = xyCase[1];
    if(lineCase === selectedXYPawn[0] && columnCase === selectedXYPawn[1]){
        endTurn();
        return;
    }
    pawns[lineCase][columnCase] = pawns[selectedXYPawn[0]][selectedXYPawn[1]];
    pawns[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    pawnsHtml[lineCase][columnCase] = pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]];
    pawnsHtml[selectedXYPawn[0]][selectedXYPawn[1]] = "";
    movePawnHtmlToCase(pawnsHtml[lineCase][columnCase], lineCase, columnCase);
    if(pawns[lineCase][columnCase].value === VALUEPAWN)
        checkIsBecomeDame(pawns[lineCase][columnCase], lineCase, columnCase);
    endTurn();
}

function removeMovableCase(){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            casesHtml[i][j].classList.remove("movableCase");
            casesHtml[i][j].classList.remove("eatableCase");
            casesHtml[i][j].removeEventListener("click", clickOnMovableCase);
            casesHtml[i][j].removeEventListener("click", clickOnEatableCase);
            casesHtml[i][j].removeEventListener("click", clickOnEatableCaseDame)
        }
    }
}

function removePawnPoint(removeCursor){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(pawnsHtml[i][j] !== ""){
                pawnsHtml[i][j].classList.remove("selectedPawn");
                if(removeCursor)
                    pawnsHtml[i][j].classList.remove("cursorPointer");
            }
        }
    }
}

function removePawnPointListeners(){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(pawnsHtml[i][j] !== ""){
                pawnsHtml[i][j].removeEventListener("click", pawnClicked);
                pawnsHtml[i][j].removeEventListener("click", dameClicked);
            }
        }
    }
}

function movePawnHtmlToCase(pawnHtml, i, j){
    pawnHtml.style.top = i*sizeOfCase+"px";
    pawnHtml.style.left = j*sizeOfCase+"px";
}

function getXYFromPawn(pawn){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(pawnsHtml[i][j] === pawn)
                return [i,j];
        }
    }
}

function getXYFromCase(caseHtml){
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(casesHtml[i][j] === caseHtml)
                return [i,j];
        }
    }
}

function invertActualPlayer(){
    if(actualPlayerColor === COLORBLACK)
        actualPlayerColor = COLORWHITE;
    else
        actualPlayerColor = COLORBLACK;
}

function displayActualPlayer(){
    if(actualPlayerColor === COLORBLACK){
        playerColorHtml.innerText = "Noirs";
    }else
        playerColorHtml.innerText = "Blancs";
}

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function Pawn(color, value){
    this.color = color;
    this.value = value;
}

function setTimer(){
    secondsSpan.innerText = parseInt(secondsSpan.innerText) + 1;
    if(secondsSpan.innerText.length === 1)
        secondsSpan.innerText = "0"+secondsSpan.innerText;
    if(secondsSpan.innerText === "60"){
        secondsSpan.innerText = "00";
        minutesSpan.innerText = parseInt(minutesSpan.innerText)+1;
        if(minutesSpan.innerText.length === 1)
            minutesSpan.innerText = "0"+minutesSpan.innerText;
    }
}

function isEnd(){
    let numberWhite = 0;
    let numberBlack = 0;
    for(let i=0;i<10;i++){
        for(let j=0;j<10;j++){
            if(pawns[i][j] !== undefined && pawns[i][j] !== ""){
                if(pawns[i][j].color === COLORWHITE)
                    numberWhite++;
                else
                    numberBlack++;

                if(numberWhite > 0 && numberBlack > 0)
                    return false;
            }
        }
    }

    displayEnd();
    return true;
}

function displayEnd(){
    clearInterval(timer);

    score.classList.add("z-index12");
    blackContainer.removeEventListener("animationend", blackContainerEventHide);
    blackContainer.classList.remove("display-none");
    blackContainer.style.animation = "opacityShow 0.1s linear forwards";
}

function blackContainerEventHide(){
    blackContainer.classList.add("display-none");
}

function clickOnRefresh(){
    minutesSpan.innerText = "00";
    secondsSpan.innerText = "00";

    pawnsHtml = [];
    pawns = [];
    casesHtml = [];
    selectedXYPawn = [];
    gamePawns.innerHTML = "";
    lineContainer.innerHTML = "";

    launchGame();

    score.classList.remove("z-index12");
    blackContainer.addEventListener("animationend", blackContainerEventHide);
    blackContainer.style.animation = "opacityHide 0.1s linear forwards";
}
