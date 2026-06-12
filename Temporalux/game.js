/*Tempora Lux Challenge Game*/

document.addEventListener("DOMContentLoaded", () => {
  const watch = document.getElementById("watch");
  const obstacle = document.getElementById("obstacle");
  const score = document.getElementById("score");
  const startButton = document.getElementById("startButton");
  const speedDisplay = document.getElementById("speedDisplay");

   
  if (!watch || !obstacle || !score || !startButton || !speedDisplay) return;

  let gameLoop;
  let currentSpeed = 7;
  let frameCount = 0;
  let isJumping = false;
  let jumpStart = 0;

  function getLevelName(speed) {
    if (speed < 9) return "🐌 Langsam";
    if (speed < 11) return "🐇 Mittel";
    if (speed < 13) return "🦅 Schnell";
    return "🔥 Wahnsinn";
  }

  function jump() {
    if (watch.classList.contains("jump-animation")) return;

    isJumping = true;
    jumpStart = performance.now();

    watch.classList.add("jump-animation");

    setTimeout(() => {
      watch.classList.remove("jump-animation");
      isJumping = false;
    }, 600);
  }

  function getWatchBottom() {
    if (!isJumping) return 0;

    const t = (performance.now() - jumpStart) / 600;
    return Math.max(0, Math.sin(Math.PI * t) * 150);
  }

document.addEventListener("keydown", (event) => {
  if (event.code === "Space") {
    event.preventDefault();
    jump();
  }
});

  function startGame() {
    score.innerText = "0";
    currentSpeed = 7;
    frameCount = 0;

    watch.classList.remove("jump-animation");
    obstacle.style.left = "550px";

    speedDisplay.innerText = getLevelName(currentSpeed);

    startButton.disabled = true;
    startButton.innerText = "Läuft...";

    clearInterval(gameLoop);

    gameLoop = setInterval(() => {
      const obstacleLeft = parseInt(
        window.getComputedStyle(obstacle).getPropertyValue("left")
      );

      const watchBottom = getWatchBottom();

      obstacle.style.left = obstacleLeft - currentSpeed + "px";

      if (obstacleLeft < -60) {
        obstacle.style.left = "620px";
      }

      frameCount++;

      if (frameCount % 10 === 0) {
        score.innerText = parseInt(score.innerText) + 1;

        if (parseInt(score.innerText) % 10 === 0) {
          currentSpeed += 0.5;
          speedDisplay.innerText = getLevelName(currentSpeed);
        }
      }

      const margin = 18;

      const horizOverlap =
        obstacleLeft < 190 - margin && obstacleLeft + 50 > margin;

      const vertOverlap = watchBottom < 50 - margin;

      if (horizOverlap && vertOverlap) {
        clearInterval(gameLoop);

        speedDisplay.innerText = "";
        startButton.disabled = false;
        startButton.innerText = "Start";

        alert("Game Over");

        score.innerText = "0";
      }
    }, 16);
  }

  startButton.addEventListener("click", startGame);
});
