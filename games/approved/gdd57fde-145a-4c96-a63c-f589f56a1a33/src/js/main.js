addEventListener('DOMContentLoaded', () => {    
    let boundingBoxD = document.getElementById("boundry").getBoundingClientRect();
    let scoreE = document.getElementById("score");
    let finalScore = document.getElementById("finalScore");
    finalScore.style.display = "none"; 

    let handleMouseMove = (e) => {
        let paddleT = document.getElementById("top");
        let paddleB = document.getElementById("bottom");
        let paddleTD = document.getElementById("top").getBoundingClientRect();

    //   console.log(paddleTD);
        if(e.clientX - (paddleTD.width / 2) > 0 && e.clientX + (paddleTD.width / 2) < boundingBoxD.right){
            paddleT.style.left = e.clientX - (paddleTD.width / 2) + 'px';
            paddleB.style.left = e.clientX - (paddleTD.width / 2) + 'px';
        }else if(e.clientX - (paddleTD.width / 2) < 100){
            paddleB.style.left = '0px';
            paddleT.style.left = '0px';
        }else{
            paddleB.style.left = boundingBoxD.right - paddleTD.width + 'px';
            paddleT.style.left = boundingBoxD.right - paddleTD.width + 'px';
        }
    };

    let addListner = (()=> addEventListener('mousemove', handleMouseMove));
    let removeListner = (()=> removeEventListener('mousemove', handleMouseMove));



    let ball = document.getElementById("ball");
    let ballD = document.getElementById("ball").getBoundingClientRect();

    

    let initialVelocity = (() =>{

        let xV = Math.floor(Math.random() * 2)+1;
        let yV = Math.floor(Math.random() * 2)+1;

        return {"xV" : xV, "yV" : yV};
    });

    let velocity = initialVelocity();
    let score = 0;

    let startBall = (() => intID = setInterval(() => {
            
        ballD = document.getElementById("ball").getBoundingClientRect();
        let paddleTD = document.getElementById("top").getBoundingClientRect();
        let paddleBD = document.getElementById("bottom").getBoundingClientRect();
        
        if(ballD.top <= 30 || ballD.bottom >= boundingBoxD.bottom){  
            halt(score);
            return;
        }

        if(ballD.left <= 0 || ballD.right >= boundingBoxD.right){
            velocity.xV = -velocity.xV;
        }

        if(ballD.top <= paddleTD.bottom && ballD.left >= paddleTD.left && ballD.right <= paddleTD.right){
            velocity.yV = -velocity.yV;
            score++;
        }

        if(ballD.bottom >= paddleBD.top && ballD.left >= paddleBD.left && ballD.right <= paddleBD.right){
            velocity.yV = -velocity.yV;
            score++;
        }

        scoreE.innerHTML = score;
        //ball.style.top = ballD.top + velocity.yV + 'px';
        ball.style.top = ballD.top + velocity.yV - 30 + 'px';
        ball.style.left = ballD.left + velocity.xV + 'px';

    }, 1));

    let startGame = (() => {
        addListner();
        startBall();
    });

    var handleSubmitScoreClick = () => {
        parent.submitScore(score);
        reset();
    };

    let halt = ((score) => {
        document.getElementById("ScoreVal").innerHTML = score;
        clearInterval(intID);
        removeListner();
        finalScore.style.display = "block";

        document.getElementById("submitScore").addEventListener('click', handleSubmitScoreClick);
    });

    let reset = (() => {
        document.getElementById("submitScore").removeEventListener('click', handleSubmitScoreClick);
        finalScore.style.display = "none";

        ball.style.top = '50%';
        ball.style.left = '50%';
        score = 0;
        velocity = initialVelocity();
        startGame();
    });

    startGame();

});