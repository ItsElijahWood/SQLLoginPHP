let attempts = 0; // Initialize attempts counter

document
  .getElementById("settingsForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let maxNumber = document.getElementById("maxNumber").value;
    fetch("numguess-reset.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "maxNumber=" + maxNumber,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          document.getElementById("feedback").textContent =
            "Maximum number set to " + maxNumber + ". Start guessing!";
          document.getElementById("guess").max = maxNumber;
        }
      })
      .catch((error) => {
        document.getElementById("feedback").textContent =
          "Error: " + error.message;
        document.getElementById("feedback").style.opacity = 1;
      });
  });

document
  .getElementById("guessForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let guess = document.getElementById("guess").value;
    let feedback = document.getElementById("feedback");

    fetch("numguess.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "guess=" + guess,
    })
      .then((response) => response.json())
      .then((data) => {
        if (!data.success) {
          attempts++; // Increment counter on incorrect guess
          feedback.textContent = data.message + " Attempts: " + attempts;
        } else {
          feedback.textContent = data.message;
        }
        feedback.style.opacity = 1;
      })
      .catch((error) => {
        feedback.textContent = "Error: " + error.message;
        feedback.style.opacity = 1;
      });
  });

document.getElementById("resetButton").addEventListener("click", function () {
  fetch("/dashboard/webdev/pages/games/guess-the-number/numguess-reset.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        attempts = 0; // Reset counter on game reset
        document.getElementById("feedback").textContent =
          "Game has been reset. Set a number then Start guessing!";
        document.getElementById("feedback").style.opacity = 1;
      }
    })
    .catch((error) => {
      document.getElementById("feedback").textContent =
        "Error: " + error.message;
      document.getElementById("feedback").style.opacity = 1;
    });
});
