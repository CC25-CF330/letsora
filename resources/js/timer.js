// Timer functionality
document.addEventListener("DOMContentLoaded", function () {
    const timerDisplay = document.getElementById("timer-display");
    const timerProgress = document.getElementById("timer-progress");
    const startButton = document.getElementById("start-timer");
    const pauseButton = document.getElementById("pause-timer");
    const resetButton = document.getElementById("reset-timer");

    // Check if elements exist
    if (
        !timerDisplay ||
        !timerProgress ||
        !startButton ||
        !pauseButton ||
        !resetButton
    ) {
        console.error("Timer elements not found");
        return;
    }

    let timeLeft = 25 * 60; // 25 minutes in seconds
    let timerInterval = null;
    const circumference = 2 * Math.PI * 45; // 2πr where r=45

    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerDisplay.textContent = `${minutes
            .toString()
            .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

        // Update progress circle
        const progress = (timeLeft / (25 * 60)) * circumference;
        timerProgress.style.strokeDashoffset = circumference - progress;
    }

    function startTimer() {
        if (timerInterval) return;

        startButton.classList.add("hidden");
        pauseButton.classList.remove("hidden");

        timerInterval = setInterval(() => {
            timeLeft--;
            updateTimer();

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerInterval = null;
                startButton.classList.remove("hidden");
                pauseButton.classList.add("hidden");
                timeLeft = 25 * 60;
                updateTimer();
                // Play notification sound
                new Audio(
                    "https://assets.mixkit.co/sfx/preview/mixkit-alarm-digital-clock-beep-989.mp3"
                ).play();
            }
        }, 1000);
    }

    function pauseTimer() {
        clearInterval(timerInterval);
        timerInterval = null;
        startButton.classList.remove("hidden");
        pauseButton.classList.add("hidden");
    }

    function resetTimer() {
        clearInterval(timerInterval);
        timerInterval = null;
        timeLeft = 25 * 60;
        updateTimer();
        startButton.classList.remove("hidden");
        pauseButton.classList.add("hidden");
    }

    // Event Listeners
    startButton.addEventListener("click", startTimer);
    pauseButton.addEventListener("click", pauseTimer);
    resetButton.addEventListener("click", resetTimer);

    // Initialize timer
    updateTimer();
});
