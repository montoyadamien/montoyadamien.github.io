let player1;
let player2;
let ball;
let playerSpeed;
let canvasContext;
let canvasWidth;
let canvasHeight;
let canvas;
//quel est le prochain joueur qui doit jouer
let playerToRecupBall;
let gameType;
let ONEPLAYERE = "ONEPLAYER_EASY";
let ONEPLAYERD = "ONEPLAYER_DIFFICULT";
let TWOPLAYER = "TWOPLAYER";

let blackContainer;
let buttonRefresh;

let start;
let span3;
let span2;
let span1;

let playerEasyButton;
let playerHardButton;
let doublePlayersButton;
let endGameText;

let arrowDownPlayer1;
let arrowUpPlayer1;
let arrowUpPlayer1Touched = false;
let arrowDownPlayer1Touched = false;

let arrowDownPlayer2;
let arrowUpPlayer2;
let arrowUpPlayer2Touched = false;
let arrowDownPlayer2Touched = false;

let elementsColor = "#16a085";

let game = {
        start : function() {
            window.addEventListener('keydown', function (e) {
                e.preventDefault();
                game.keys = (game.keys || []);
                game.keys[e.key] = (e.type === "keydown");
            });
            window.addEventListener('keyup', function (e) {
                game.keys[e.key] = (e.type === "keydown");
            });
            canvasContext.clearRect(0, 0, canvasWidth, canvasHeight);
            playerSpeed = canvasHeight/100;
            updateGame();
            launchBall();
        },
        clear : function() {
            canvasContext.clearRect(0, 0, canvasWidth, canvasHeight);
        },
        launchGame : function(){
            this.interval = setInterval(updateGame, 20);
        }
    };

function launchBall(){
    let angle = (getRandomInt(90)+1)/36/2;
    let horizontal = getRandomInt(2);
    let vertical = getRandomInt(2);

    //ball va a droite de base
    let moveHorizontal = 1;
    //ball va vers bas de base
    let moveVertical = angle;

    if(horizontal === 1)
        moveHorizontal*=-1;

    if(vertical === 1)
        moveVertical *= -1;

    if(moveHorizontal < 0)
        playerToRecupBall = player1;
    else
        playerToRecupBall = player2;

    ball.direction = [moveHorizontal, moveVertical]
}

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function Player(x, y, width, height, name){
    this.name = name;
    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
    this.acceleration = 0;
    this.update = function(){
        canvasContext.fillStyle = elementsColor;
        canvasContext.fillRect(this.x, this.y, this.width, this.height);
    };
    this.move = function(top){
        if(top === -1){
            if(this.acceleration > 0)
                this.acceleration = 0;
            this.acceleration -= 0.005;
            if(this.y - playerSpeed < 0)
                this.y = 0;
            else
                this.y -= playerSpeed;
        }else{
            if(this.acceleration < 0)
                this.acceleration = 0;
            this.acceleration += 0.005;
            if(this.y + playerSpeed > canvasHeight-this.height)
                this.y = canvasHeight-this.height;
            else
                this.y += playerSpeed;
        }
    };
}

function Ball(x, y, radius){
    this.x = x; //le milieu de la balle
    this.y = y; //le millieu de la balle
    this.radius = radius;
    this.ballSpeed = canvasWidth/150;
    //horizontal,vertical
    //-1 = left, top
    //1 = right, bottom
    this.direction = [0,0];
    this.update = function(){
        this.x = this.x+(this.direction[0]*this.ballSpeed);
        this.y = this.y+(this.direction[1]*this.ballSpeed);

        if(this.x-this.radius <= 0 || this.x+this.radius >= canvasWidth){
            endGame();
        }else{
            //check if touch players
            //player left = player 1
            //1.1 pour la marge quand la balle va vite
            if(this.direction[0] === -1){
                if(this.x - 1.1*this.radius <= player1.width){
                    if(this.y+this.radius/1.5 >= player1.y && this.y-this.radius/1.5 <= player1.y+player1.height){
                        this.touchPlayer(player1);
                    }
                }
            }else{
                if(this.x + 1.1*this.radius >= canvasWidth - player2.width){
                    if(this.y+this.radius/1.5 >= player2.y && this.y-this.radius/1.5 <= player2.y+player2.height){
                        this.touchPlayer(player2);
                    }
                }
            }
        }


        if(this.y-this.radius <= 0 || this.y+this.radius >= canvasHeight){
            this.direction[1] *= -1;
        }
        //joueur a pas recup la balle
        canvasContext.fillStyle = elementsColor;
        canvasContext.beginPath();
        canvasContext.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
        canvasContext.fill();
    };
    this.touchPlayer = function (playerTouched) {
        playerTouched.calculatedPath = null;
        this.direction[0] *= -1;
        this.direction[1] += playerTouched.acceleration;
        this.increaseSpeed();
        invertPlayerToRecupBall();
    };
    this.increaseSpeed = function(){
        this.ballSpeed *= 1.05;
    };
}

function invertPlayerToRecupBall(){
    if(playerToRecupBall === player1)
        playerToRecupBall = player2;
    else
        playerToRecupBall = player1;
}

function updateGame() {
    game.clear();
    if ((game.keys && game.keys["ArrowUp"]) || arrowUpPlayer2Touched) {
        player2.move(-1);
    } else if ((game.keys && game.keys["ArrowDown"]) || arrowDownPlayer2Touched) {
        player2.move(1);
    } else
        player2.acceleration = 0;

    if(gameType === TWOPLAYER){
        if (game.keys && game.keys["z"] || arrowUpPlayer1Touched) {
            player1.move(-1);
        }else if ((game.keys && game.keys["s"]) || arrowDownPlayer1Touched) {
            player1.move(1);
        } else
            player1.acceleration = 0;
    }else if(gameType === ONEPLAYERD){
        moveIaDifficult();
    }else if(gameType === ONEPLAYERE){
        moveIaEasy();
    }
    player1.update();
    player2.update();
    ball.update();
}

function moveIaDifficult(){
    if(ball.direction[0] === -1){
        if(player1.calculatedPath == null){
            let ballTest = [];
            ballTest[0] = ball.x;
            ballTest[1] = ball.y;
            let directionTop = ball.direction[1];

            while(ballTest[0] > 0){
                ballTest[0] = ballTest[0]+(-1*ball.ballSpeed);
                ballTest[1] = ballTest[1]+(directionTop*ball.ballSpeed);
                if(ballTest[1]-ball.radius <= 0 || ballTest[1]+ball.radius >= canvasHeight){
                    directionTop *= -1;
                }
            }

            player1.calculatedPath = ballTest[1];
        }


        if(player1.y > 0 && player1.calculatedPath-ball.radius < player1.y+(player1.height/2)){
            player1.move(-1);
        }

        if(player1.y + player1.height < canvasHeight && player1.calculatedPath+ball.radius > player1.y+(player1.height/2)){
            player1.move(1);
        }

    }
}

function moveIaEasy(){
    if(ball.direction[0] === -1 && player1.y >= 0 && player1.y + player1.height <= canvasHeight){
        let middleBall = ball.y + (ball.radius/2);
        let middlePaddle = player1.y + (player1.height/2);

        if(middleBall < middlePaddle){
            player1.move(-1);
        }

        if(middleBall > middlePaddle){
            player1.move(1);
        }
    }
}

function initGame(){
    let clientWidth = window.innerWidth;
    let clientHeight = window.innerHeight;

    //8 horizontal, 6 vertical
    let ratio = 6/8;

    if(clientWidth*ratio > window.innerHeight){
        canvasHeight = clientHeight;
        canvasWidth = canvasHeight/(6/8);
    }else{
        canvasWidth = clientWidth;
        canvasHeight = clientWidth*(6/8);
    }

    let playerWidth = 15;
    let playerHeight = canvasHeight/10;
    let ballRadius = playerHeight/5;

    canvas.width = canvasWidth;
    canvas.height = canvasHeight;
    player1 = new Player(0, (canvasHeight/2)-(playerHeight/2), playerWidth, playerHeight, "Joueur Gauche");
    player2 = new Player((canvasWidth-playerWidth), (canvasHeight/2-playerHeight/2), playerWidth, playerHeight, "Joueur Droite");
    ball = new Ball((canvasWidth/2), (canvasHeight/2), ballRadius);
}

(function(){
    canvas = document.getElementById("canvasGame");
    canvasContext = canvas.getContext("2d");

    initGame();

    start = document.getElementById("start");
    span3 = document.getElementById("span3");
    span2 = document.getElementById("span2");
    span1 = document.getElementById("span1");

    blackContainer = document.getElementById("black-container");
    buttonRefresh = document.getElementById("refresh-game");
    playerEasyButton = document.getElementById("player-easy");
    playerHardButton = document.getElementById("player-hard");
    doublePlayersButton = document.getElementById("two-players");
    endGameText = document.getElementById("end-game-text");

    buttonRefresh.addEventListener("click", clickOnRefresh);

    playerEasyButton.addEventListener("click", function(){
        gameType = ONEPLAYERE;
        selectGameType();
    });
    playerHardButton.addEventListener("click", function(){
        gameType = ONEPLAYERD;
        selectGameType();
    });
    doublePlayersButton.addEventListener("click", function(){
        gameType = TWOPLAYER;
        selectGameType();
    });

    span3.addEventListener("animationend", function(){
        span3.style.animation = "";
        span2.style.animation = "animationBegin 1s";
    });
    span2.addEventListener("animationend", function(){
        span2.style.animation = "";
        span1.style.animation = "animationBegin 1s";
    });
    span1.addEventListener("animationend", function(){
        span1.style.animation = "";
        game.launchGame();
    });

    start.addEventListener("click", function(){
        start.classList.add("display-none");
        game.start();
        span3.style.animation = "animationBegin 1s";
    });
})();

function endGame(){
    clearInterval(game.interval);
    invertPlayerToRecupBall();
    arrowDownPlayer1Touched = false;
    arrowDownPlayer2Touched = false;
    arrowUpPlayer1Touched = false;
    arrowUpPlayer2Touched = false;
    
    arrowDownPlayer1.classList.add("display-none");
    arrowDownPlayer2.classList.add("display-none");
    arrowUpPlayer1.classList.add("display-none");
    arrowUpPlayer2.classList.add("display-none");
    
    blackContainer.removeEventListener("animationend", blackContainerEventHide);
    blackContainer.classList.remove("display-none");
    blackContainer.style.animation = "opacityShow 0.5s linear forwards";
}

function clickOnRefresh(){
    game.clear();

    initGame();

    playerHardButton.classList.remove("display-none");
    playerEasyButton.classList.remove("display-none");
    doublePlayersButton.classList.remove("display-none");
    buttonRefresh.classList.add("display-none");
    endGameText.classList.add("display-none");
}

function selectGameType(){
    removeBlackContainer();
    start.classList.remove("display-none");

    if (navigator.userAgent.match(/(android|iphone|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
        arrowDownPlayer2 = document.getElementById("arrow-down-player2");
        arrowUpPlayer2 = document.getElementById("arrow-up-player2");
        arrowDownPlayer2.classList.remove("display-none");
        arrowUpPlayer2.classList.remove("display-none");
        arrowDownPlayer2.addEventListener("touchstart", function(e){
            e.preventDefault();
            arrowDownPlayer2Touched = true;
        });
        arrowDownPlayer2.addEventListener("touchend", function(e){
            e.preventDefault();
            arrowDownPlayer2Touched = false;
        });
        arrowUpPlayer2.addEventListener("touchstart", function(e){
            e.preventDefault();
            arrowUpPlayer2Touched = true;
        });
        arrowUpPlayer2.addEventListener("touchend", function(e){
            e.preventDefault();
            arrowUpPlayer2Touched = false;
        });
        
        if(gameType === TWOPLAYER){
            arrowDownPlayer1 = document.getElementById("arrow-down-player1");
            arrowUpPlayer1 = document.getElementById("arrow-up-player1");
            arrowDownPlayer1.classList.remove("display-none");
            arrowUpPlayer1.classList.remove("display-none");
            arrowDownPlayer1.addEventListener("touchstart", function(e){
                e.preventDefault();
                arrowDownPlayer1Touched = true;
            });
            arrowDownPlayer1.addEventListener("touchend", function(e){
                e.preventDefault();
                arrowDownPlayer1Touched = false;
            });
            arrowUpPlayer1.addEventListener("touchstart", function(e){
                e.preventDefault();
                arrowUpPlayer1Touched = true;
            });
            arrowUpPlayer1.addEventListener("touchend", function(e){
                e.preventDefault();
                arrowUpPlayer1Touched = false;
            });
        }
    }
}

function blackContainerEventHide(){
    blackContainer.classList.add("display-none");
    playerHardButton.classList.add("display-none");
    playerEasyButton.classList.add("display-none");
    doublePlayersButton.classList.add("display-none");
    buttonRefresh.classList.remove("display-none");
    endGameText.classList.remove("display-none");
}

function removeBlackContainer(){
    blackContainer.addEventListener("animationend", blackContainerEventHide);
    blackContainer.style.animation = "opacityHide 0.5s linear forwards";
}
