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


let game = {
    start : function() {
        //50 fps
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
            this.acceleration -= 0.01;
            if(this.y - playerSpeed < 0)
                this.y = 0;
            else
                this.y -= playerSpeed;
        }else{
            this.acceleration += 0.01;
            if(this.y + playerSpeed > canvasHeight-this.height)
                this.y = canvasHeight-this.height;
            else
                this.y += playerSpeed;
        }
    };
}

function Ball(x, y, radius){
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.ballSpeed = canvasWidth/200;
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
            if(this.direction[0] === -1){
                if(this.x - this.radius <= player1.width){
                    if(this.y+this.radius/2 >= player1.y && this.y-this.radius/2 <= player1.y+player1.height){
                        this.touchPlayer(player1);
                    }
                }
            }else{
                if(this.x + this.radius >= canvasWidth - player2.width){
                    if(this.y+this.radius/2 >= player2.y && this.y-this.radius/2 <= player2.y+player2.height){
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
        this.ballSpeed += canvasWidth/2000;
    };
}

function endGame(){
    clearInterval(game.interval);
    invertPlayerToRecupBall();
    let winner = document.getElementById("winner");
    winner.appendChild(document.createTextNode("Gagnant : "+playerToRecupBall.name));
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
    if (game.keys && game.keys["z"]) {player1.move(-1); }
    else if (game.keys && game.keys["s"]) {player1.move(1); }
    else player1.acceleration = 0;
    player1.update();
    player2.update();
    ball.update();
}

(function(){
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

    canvas = document.getElementById("canvasGame");
    canvas.width = canvasWidth;
    canvas.height = canvasHeight;
    canvasContext = canvas.getContext("2d");
    player1 = new Player(0, (canvasHeight/2)-(playerHeight/2), playerWidth, playerHeight, "Joueur Gauche");
    player2 = new Player((canvasWidth-playerWidth), (canvasHeight/2-playerHeight/2), playerWidth, playerHeight, "Joueur Droite");
    ball = new Ball((canvasWidth/2), (canvasHeight/2), ballRadius);

    let start = document.getElementById("start");
    let span3 = document.getElementById("3");
    let span2 = document.getElementById("2");
    let span1 = document.getElementById("1");
    start.addEventListener("click", function(e){
        e.target.parentNode.removeChild(e.target);
        game.start();
        span3.style.animation = "animationBegin 1s";
        span3.addEventListener("animationend", function(){
            span3.parentNode.removeChild(span3);
            span2.style.animation = "animationBegin 1s";
        });
        span2.addEventListener("animationend", function(){
            span2.parentNode.removeChild(span2);
            span1.style.animation = "animationBegin 1s";
        });
        span1.addEventListener("animationend", function(){
            span1.parentNode.removeChild(span1);
            game.launchGame();
        });
    });

})();