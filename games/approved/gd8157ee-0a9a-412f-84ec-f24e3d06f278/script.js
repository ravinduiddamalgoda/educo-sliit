/* 

	This bit of code is taken from : https://github.com/htchristie/dino-run
	
*/

const SPEED_SCALE = 0.00001;

const game = document.querySelector("#game");
const scoreDisplay = document.querySelector("#score");
const startMessage = document.querySelector("#start-message");
const gameoverMessage = document.querySelector("#gameover-message");

document.addEventListener("keydown", startGame, { once: true });

/* variáveis gerais */
let lastTime;
let speedScale;
let score;

/* atualização de frames */
function update(time) { 
  if (lastTime == null) {
    lastTime = time;
    window.requestAnimationFrame(update);
    return;
  }

  const delta = time - lastTime;

  updateGround(delta, speedScale);
  updateDino(delta, speedScale);
  updateCactus(delta, speedScale);
  updateSpeedScale(delta);
  updateScore(delta);

  if (checkGameOver()) return handleGameOver();

  lastTime = time;
  window.requestAnimationFrame(update);
}

function startGame() {
  lastTime = null;
  speedScale = 1;
  score = 0;
  setupGround();
  setupDino();
  setupCactus();
  startMessage.classList.add("hide");
  gameoverMessage.classList.add("hide");
  window.requestAnimationFrame(update);
}

/* acelera o jogo com o passar do tempo */
function updateSpeedScale(delta) { 
  speedScale += delta * SPEED_SCALE;
}

function updateScore(delta) {
  score += delta * 0.01; 
  scoreDisplay.textContent = Math.floor(score);
}

/* condições de colisão */
function checkCollision(rect1, rect2) {
  return (
    rect1.left < rect2.right &&
    rect1.top < rect2.bottom &&
    rect1.right > rect2.left &&
    rect1.bottom > rect2.top
  );
}

function checkGameOver() {
  const dinoRect = getDinoRect();
  return getCactusRects().some(rect => checkCollision(rect, dinoRect)); /* verifica colisão com algum dos cactus */
}

function handleGameOver() {
  setDinoLose();
  setTimeout(() => {
    document.getElementById("submitScore").addEventListener("click", ()=>{
		submitScore();
	}, { once: true }); /* impede clique acidental */
    gameoverMessage.classList.remove("hide");
  }, 100);
}

function submitScore(){
	parent.submitScore(document.getElementById("score").innerText);
	startGame();
}




/* MANIPULAÇÃO DAS PROPRIEDADES CSS */

/* pega valor da propriedade */
function getCustomProperty(elem, prop) {
  return parseFloat(getComputedStyle(elem).getPropertyValue(prop)) || 0;
}

/* define valor da propriedade */
function setCustomProperty(elem, prop, value) {
  elem.style.setProperty(prop, value);
}

/* incrementa o valor da propriedade */
function incrementCustomProperty(elem, prop, inc) {
  setCustomProperty(elem, prop, getCustomProperty(elem, prop) + inc);
}


/* MOVIMENTO DO CHÃO */

const GROUND_SPEED = 0.05;
const grounds = document.querySelectorAll(".ground");

function setupGround() {
  setCustomProperty(grounds[0], "--left", 0);
  setCustomProperty(grounds[1], "--left", 300);
}

function updateGround(delta, speedScale) {
  grounds.forEach(ground => {
    incrementCustomProperty(ground, "--left", delta * speedScale * GROUND_SPEED * -1); /* move o chão conforme a velocidade do jogo */

    if (getCustomProperty(ground, "--left") <= -300) {
      incrementCustomProperty(ground, "--left", 600); /* faz um loop nos elementos */
    }
  });
}

/* MOVIMENTO DO DINOSSAURO */

const dino = document.querySelector("#dino");
const JUMP_SPEED = 0.45;
const GRAVITY = 0.0015;
const DINO_FRAME_COUNT = 2;
const FRAME_TIME = 100;

let isJumping;
let dinoFrame;
let currentFrameTime;
let yVelocity;

function setupDino() {
  isJumping = false;
  dinoFrame = 0;
  currentFrameTime = 0;
  yVelocity = 0;

  setCustomProperty(dino, "--bottom", 0);
  document.removeEventListener("keydown", onJump); /* reseta o dinossauro se o jogador morrer enquanto pula */
  document.addEventListener("keydown", onJump);
}

function updateDino(delta, speedScale) {
  handleRun(delta, speedScale);
  handleJump(delta);
}

function getDinoRect() {
  return dino.getBoundingClientRect(); /* pega a hitbox do dinossauro */
}

function setDinoLose() {
  dino.src = "images/dino-lose.png";
}

function handleRun(delta, speedScale) {
  if (isJumping) {
    dino.src = `images/dino-stationary.png`;
    return;
  }

  if (currentFrameTime >= FRAME_TIME) {
    dinoFrame = (dinoFrame + 1) % DINO_FRAME_COUNT;
    dino.src = `images/dino-run-${dinoFrame}.png`; /* troca entre as imagens pra simular movimento */
    currentFrameTime -= FRAME_TIME;
  }
  currentFrameTime += delta * speedScale;
}

function handleJump(delta) {
  if (!isJumping) return;

  incrementCustomProperty(dino, "--bottom", yVelocity * delta);

  if (getCustomProperty(dino, "--bottom") <= 0) {
    setCustomProperty(dino, "--bottom", 0);
    isJumping = false;
  }

  yVelocity -= GRAVITY * delta;
}

function onJump(e) {
  if (e.code !== "Space" || isJumping) return;

  yVelocity = JUMP_SPEED;
  isJumping = true;
}

/* ADICIONA CACTUS */

const CACTUS_SPEED = 0.05;
const CACTUS_INTERVAL_MIN = 500;
const CACTUS_INTERVAL_MAX = 2000;

let nextCactusTime;

function setupCactus() {
  nextCactusTime = CACTUS_INTERVAL_MIN;
  document.querySelectorAll(".cactus").forEach(cactus => {
    cactus.remove(); /* remove cactus quando reinicia o jogo */
  })
}

function updateCactus(delta, speedScale) {
  document.querySelectorAll(".cactus").forEach(cactus => {
    incrementCustomProperty(cactus, "--left", delta * speedScale * CACTUS_SPEED * -1);
    if (getCustomProperty(cactus, "--left") <= -100) {
      cactus.remove(); /* remove cactus fora da tela pra não prejudicar a performance do jogo */
    }
  })

  if (nextCactusTime <= 0) {
    createCactus();
    nextCactusTime =
      randomizer(CACTUS_INTERVAL_MIN, CACTUS_INTERVAL_MAX) / speedScale;
  }
  nextCactusTime -= delta;
}

function getCactusRects() {
  return [...document.querySelectorAll(".cactus")].map(cactus => {
    return cactus.getBoundingClientRect(); /* pega a hitbox de todos os cactus na tela */
  })
}

function createCactus() {
  const cactus = document.createElement("img");
  cactus.src = "images/cactus.png";
  cactus.classList.add("cactus");
  setCustomProperty(cactus, "--left", 100);
  game.append(cactus); 
}

function randomizer(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min); /* escolhe um número entre o mínimo e o máximo */
}
