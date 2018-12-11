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

let iaOrTwoPlayers;
let replay;

let start;
let span3;
let span2;
let span1;
let winner;

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
        canvasContext.fillStyle = "#2c3e50";
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
        canvasContext.fillStyle = "#2c3e50";
        canvasContext.beginPath();
        canvasContext.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
        canvasContext.fill();
    };
    this.touchPlayer = function (playerTouched) {
        this.direction[0] *= -1;
        this.direction[1] += playerTouched.acceleration;
        this.increaseSpeed();
        invertPlayerToRecupBall();
    };
    this.increaseSpeed = function(){
        this.ballSpeed *= 1.05;
    };
}

function endGame(){
    clearInterval(game.interval);
    invertPlayerToRecupBall();
    winner.innerText = "Gagnant : "+playerToRecupBall.name;
    show(replay);
}

function invertPlayerToRecupBall(){
    if(playerToRecupBall === player1)
        playerToRecupBall = player2;
    else
        playerToRecupBall = player1;
}

function updateGame() {
    game.clear();
    if (game.keys && game.keys["ArrowUp"]) {player2.move(-1); }
    else if (game.keys && game.keys["ArrowDown"]) {player2.move(1); }
    else player2.acceleration = 0;
    if(gameType === TWOPLAYER){
        if (game.keys && game.keys["z"]) {player1.move(-1); }
        else if (game.keys && game.keys["s"]) {player1.move(1); }
        else player1.acceleration = 0;
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

        if(player1.y > 0 && ballTest[1]-ball.radius < player1.y+(player1.height)){
            player1.move(-1);
        }

        if(player1.y + player1.height < canvasHeight && ballTest[1]+ball.radius > player1.y+(player1.height)){
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
    span3 = document.getElementById("3");
    span2 = document.getElementById("2");
    span1 = document.getElementById("1");
    winner = document.getElementById("winner");

    iaOrTwoPlayers = document.getElementById("iaOrTwoPlayers");
    replay = document.getElementById("replay");

    replay.addEventListener("click", function(){
       reloadGame();
    });

    document.getElementById("onePlayerE").addEventListener("click", function(){
        gameType = ONEPLAYERE;
        hide(iaOrTwoPlayers);
    });
    document.getElementById("onePlayerD").addEventListener("click", function(){
        gameType = ONEPLAYERD;
        hide(iaOrTwoPlayers);
    });
    document.getElementById("twoPlayers").addEventListener("click", function(){
        gameType = TWOPLAYER;
        hide(iaOrTwoPlayers);
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
        hide(start);
        game.start();
        span3.style.animation = "animationBegin 1s";
    });
})();

function reloadGame(){
    game.clear();
    initGame();
    show(iaOrTwoPlayers);
    show(start);
    hide(replay);
    winner.innerText = "";
}

function hide(element){
    element.classList.add("displayNone");
}

function show(element){
    element.classList.remove("displayNone");
}