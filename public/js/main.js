let startTime;
let currentSentenceIndex = 0;
let totalTime = 0;

const inputField = document.getElementById("inputField");
const timeDisplay = document.getElementById("time");

const csrfToken = document
    .querySelector("[name='csrf-token']")
    .getAttribute("content");

inputField.addEventListener("input", function () {
    if (!startTime) {
        startTime = new Date().getTime();
    }

    if (inputField.value === sentences[currentSentenceIndex].sentence) {
        const endTime = new Date().getTime();
        const timeTaken = (endTime - startTime) / 1000;

        totalTime += timeTaken;
        timeDisplay.innerText = totalTime.toFixed(2);

        currentSentenceIndex++;
        if (currentSentenceIndex < sentences.length) {
            document.getElementById("sentence").innerText =
                sentences[currentSentenceIndex].sentence;
            inputField.value = "";
            startTime = null;
        } else {
            fetch("/save-score", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    time: totalTime,
                }),
            })
                .then((response) => {
                    if (response.ok) {
                        window.location.href = "/dashboard";
                    } else {
                        console.log("Error");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    }
});
