let startTime;
const sentence = document.getElementById("sentence").innerText;
const inputField = document.getElementById("inputField");
const timeDisplay = document.getElementById("time");

const csrfToken = document
    .querySelector("[name='csrf-token']")
    .getAttribute("content");

console.log(csrfToken);

inputField.addEventListener("input", function () {
    if (!startTime) {
        startTime = new Date().getTime();
    }
    console.log(`start: ${startTime}`);

    if (inputField.value === sentence) {
        const endTime = new Date().getTime();
        console.log(`end: ${endTime}`);
        const timeTaken = (endTime - startTime) / 1000;
        console.log(`time: ${timeTaken}`);
        timeDisplay.innerText = timeTaken.toFixed(2);

        // タイムを保存する処理
        fetch("/save-score", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                time: timeTaken,
            }),
        });
    }
});
