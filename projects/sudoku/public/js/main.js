let grille = [];
let cases = [];
let game;
let minutesSpan;
let secondsSpan;
let timerVar;

let blackContainer;
let buttonEasy;
let buttonMedium;
let buttonHard;
let buttonRefresh;
let endGameText;
let mode = 0;
let score;

(function(){
    buttonEasy = document.getElementById("mode-easy");
    buttonMedium = document.getElementById("mode-medium");
    buttonHard = document.getElementById("mode-hard");
    blackContainer = document.getElementById("black-container");
    buttonRefresh = document.getElementById("refresh-game");
    endGameText = document.getElementById("end-game-text");
    score = document.getElementById("score");

    buttonEasy.addEventListener("click", function(){
       mode = 3;
        launchGame();
    });

    buttonMedium.addEventListener("click", function(){
        mode = 4;
        launchGame();
    });

    buttonHard.addEventListener("click", function(){
        mode = 5;
        launchGame();
    });

    buttonRefresh.addEventListener("click", clickOnRefresh);

    minutesSpan = document.getElementById("minutes");
    secondsSpan = document.getElementById("seconds");
    game = document.getElementById("game");
    window.addEventListener("resize", function(){
        setSize();
    });
    setSize();
    let line;
    for(let i=0;i<81;i++){
        if(i%9 === 0){
            line = document.createElement("div");
            line.classList.add("line");
            game.appendChild(line);
        }
        let theCase = document.createElement("input");
        if((i>=0 && i<9) || (i>=27 && i<36) || (i>=54 && i<63)){
            theCase.classList.add("borderTop");
        }
        if(i%9 === 0 || i%9 === 3 || i%9 === 6){
            theCase.classList.add("borderLeft");
        }
        if(i%9===8){
            theCase.classList.add("borderRight");
        }
        if(i>=72 && i<81){
            theCase.classList.add("borderBottom");
        }
        theCase.type = "text";
        theCase.classList.add("case");
        line.appendChild(theCase);
        theCase.addEventListener("input", checkKey);
        cases.push(theCase);
    }
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

function blackContainerEventHide(){
    blackContainer.classList.add("display-none");
    buttonEasy.classList.add("display-none");
    buttonMedium.classList.add("display-none");
    buttonHard.classList.add("display-none");
    buttonRefresh.classList.remove("display-none");
    endGameText.classList.remove("display-none");
}

function removeBlackContainer(){
    blackContainer.addEventListener("animationend", blackContainerEventHide);
    blackContainer.style.animation = "opacityHide 0.5s linear forwards";
}

function launchGame(){
    refreshGrid();
    removeBlackContainer();
    //fill random value
    for(let i=0;i<9;i++){
        let caseAlreadyFilled = [];
        let numberAlreadyFilled = [];
        for(let j=0;j<9;j++){
            let caseX;
            let caseY;
            do{
                caseX = getRandomInt(3);
                caseY = getRandomInt(3);
            }while(checkCaseAlreadyFilled(caseAlreadyFilled, caseX, caseY));
            caseAlreadyFilled[j] = [caseX, caseY];

            let x = Math.floor(i/3)*3+caseX;
            let y = Math.floor(i%3)*3+caseY;

            let lineHtml = document.getElementsByClassName("line")[x];
            let caseHtml = lineHtml.getElementsByClassName("case")[y];
            let number;

            let k = 0;
            do{
                number = getRandomInt(9)+1;
                if(k>81){
                    refresh();
                    return;
                }
                k++;
            }while(numberAlreadyFilled.indexOf(number) !== -1 || checkMultipleNumberSameColumnLine(number, x, y));
            numberAlreadyFilled.push(number);
            grille[x][y] = number;
            caseHtml.disabled = true;
            caseHtml.value = number;
        }
    }
    for(let i=0;i<9;i++){
        removeCase(i);
    }
    timerVar = setInterval(setTimer, 1000);
}

function refresh(){
    for(let i=0;i<cases.length;i++){
        cases[i].value = "";
        cases[i].disabled = false;
    }
    launchGame();
}

function refreshGrid(){
    for(let i=0;i<9;i++){
        grille[i] = [];
        for(let j=0;j<9;j++){
            grille[i][j] = "";
        }
    }
}

function removeCase(i){
    let numToRemove = mode+getRandomInt(2);
    let caseX;
    let caseY;
    let x;
    let y;
    let lineHtml;
    let caseHtml;
    for(let j=0;j<numToRemove;j++){
        do{
            caseX = getRandomInt(3);
            caseY = getRandomInt(3);
            x = Math.floor(i/3)*3+caseX;
            y = Math.floor(i%3)*3+caseY;
            lineHtml = document.getElementsByClassName("line")[x];
            caseHtml = lineHtml.getElementsByClassName("case")[y];
        }while(grille[x][y] === "");
        grille[x][y] = "";
        caseHtml.value = "";
        caseHtml.disabled = false;
    }
}

function checkCaseAlreadyFilled(caseAlreadyFilled, x,y){
    for(let i=0;i<caseAlreadyFilled.length;i++){
        if(caseAlreadyFilled[i][0] === x && caseAlreadyFilled[i][1] === y){
            return true;
        }
    }
    return false;
}

function checkMultipleNumberSameColumnLine(number, x, y){
    for(let i=0;i<9;i++){
        if(grille[i][y] === number)
            return true;
        if(grille[x][i] === number)
            return true;
    }
    return false;
}

function checkKey(e){
    let valueToAdd;
    let eTarget = e.target.value;
    if(eTarget[1] !== undefined){
        let wrongNumber = true;
        for(let i=1;i<=9;i++){
            if(parseInt(eTarget[1]) === i){
                wrongNumber = false;
            }
        }
        if(!wrongNumber)
            e.target.value = eTarget[1];
        else
            e.target.value = eTarget[0];
    }
    eTarget = parseInt(e.target.value);
    if(eTarget > 9){
        if(e.target.value[1] !== "0"){
            valueToAdd = e.target.value[1];
            e.target.value = valueToAdd;
        }else{
            valueToAdd = e.target.value[0];
            e.target.value = valueToAdd;
        }
    }else if(!(eTarget > 0 && eTarget <= 9)){
        valueToAdd = "";
        e.target.value = "";
    }else{
        valueToAdd = e.target.value;
    }

    let lineHtml = e.target.parentNode;
    let caseHtml = e.target;

    let lineHtmlArray = Array.prototype.slice.call(e.target.parentNode.children);
    let gameLinesArray = Array.prototype.slice.call(game.children);

    let lineNumber = gameLinesArray.indexOf(lineHtml);
    let caseNumber = lineHtmlArray.indexOf(caseHtml);

    grille[lineNumber][caseNumber] = valueToAdd;
    checkEnd();
}

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function checkEnd(){
    let numberAlready;
    for(let i=0;i<9;i++){
        numberAlready = [];
        for(let j=0;j<9;j++){
            let numberToSearch = grille[i][j];
            if(numberToSearch === ""){
                return false;
            }else if(numberAlready.indexOf(numberToSearch) !== -1){
                return false;
            }
            numberAlready.push(numberToSearch);
        }
    }

    for(let i=0;i<9;i++){
        numberAlready = [];
        for(let j=0;j<9;j++){
            let numberToSearch = grille[j][i];
            if(numberToSearch === ""){
                return false;
            }else if(numberAlready.indexOf(numberToSearch) !== -1){
                return false;
            }
            numberAlready.push(numberToSearch);
        }
    }
    displayEnd();
}

function displayEnd(){
    clearInterval(timerVar);
    score.classList.add("z-index12");
    blackContainer.removeEventListener("animationend", blackContainerEventHide);
    blackContainer.classList.remove("display-none");
    blackContainer.style.animation = "opacityShow 0.5s linear forwards";
}

function clickOnRefresh(){
    secondsSpan.innerText = "00";
    minutesSpan.innerText = "00";

    score.classList.remove("z-index12");
    buttonEasy.classList.remove("display-none");
    buttonMedium.classList.remove("display-none");
    buttonHard.classList.remove("display-none");
    buttonRefresh.classList.add("display-none");
    endGameText.classList.add("display-none");
}
