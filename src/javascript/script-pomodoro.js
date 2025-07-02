let timers = document.querySelectorAll(".timer-display");
let session = document.getElementById("pomodoro-session");
let shortBreak = document.getElementById("short-break");
let longBreak = document.getElementById("long-break");
let startBtn = document.getElementById("start");
let stopBtn = document.getElementById("stop");
let restartBtn = document.getElementById("restart");
let timerMsg = document.getElementById("timer-message");

// Definindo os temporizadores
let pomodoro = document.getElementById("pomodoro-timer");
let short = document.getElementById("short-timer");
let long = document.getElementById("long-timer");

let currentTimer = null;
let myInterval = null;

function showDefaultTimer() {
    pomodoro.style.display = "block";
    short.style.display = "none";
    long.style.display = "none";
    currentTimer = pomodoro;
}
showDefaultTimer();

function hideAll() {
    timers.forEach((timer) => {
        timer.style.display = "none";
    });
}

session.addEventListener("click", () => {
    hideAll();
    pomodoro.style.display = "block";
    session.classList.add("active");
    shortBreak.classList.remove("active");
    longBreak.classList.remove("active");
    currentTimer = pomodoro;
});

shortBreak.addEventListener("click", () => {
    hideAll();
    short.style.display = "block";
    session.classList.remove("active");
    shortBreak.classList.add("active");
    longBreak.classList.remove("active");
    currentTimer = short;
});

longBreak.addEventListener("click", () => {
    hideAll();
    long.style.display = "block";
    session.classList.remove("active");
    shortBreak.classList.remove("active");
    longBreak.classList.add("active");
    currentTimer = long;
});

function startTimer(timerDisplay) {
    if (myInterval) clearInterval(myInterval);

    let timerDuration = parseFloat(timerDisplay.getAttribute("data-duration"));
    let durationInMs = timerDuration * 60 * 1000;
    let endTimestamp = Date.now() + durationInMs;

    myInterval = setInterval(() => {
        const timeRemaining = endTimestamp - Date.now();

        if (timeRemaining <= 0) {
            clearInterval(myInterval);
            timerDisplay.querySelector(".time").textContent = "00:00";
            const alarm = new Audio(
                "https://www.freespecialeffects.co.uk/soundfx/scifi/electronic.wav"
            );
            alarm.play();
        } else {
            const minutes = Math.floor(timeRemaining / 60000);
            const seconds = ((timeRemaining % 60000) / 1000).toFixed(0);
            const formattedTime = `${minutes}:${seconds.toString().padStart(2, "0")}`;
            timerDisplay.querySelector(".time").textContent = formattedTime;
        }
    }, 1000);
}

// START
startBtn.addEventListener("click", () => {
    if (currentTimer) {
        startTimer(currentTimer);
        timerMsg.style.display = "none";
    } else {
        timerMsg.style.display = "block";
    }
});

// STOP
stopBtn.addEventListener("click", () => {
    if (myInterval) clearInterval(myInterval);
});

// RESTART
restartBtn.addEventListener("click", () => {
    if (myInterval) clearInterval(myInterval);

    // Redefine todos os timers ao valor original
    pomodoro.querySelector(".time").textContent = "25:00";
    short.querySelector(".time").textContent = "5:00";
    long.querySelector(".time").textContent = "10:00";

    timerMsg.style.display = "none";
});
