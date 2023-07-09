const form = document.querySelector(".register form");
const btn = form.querySelector(".button input");
const error = form.querySelector(".error");

form.onsubmit = (e) => {
    e.preventDefault();
};

btn.onclick = () => {
    const formData = new FormData(form);

    fetch("php/rejestracja.php", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Network response was not OK.");
        })
        .then(data => {
            if (data === "success") {
                location.href = "użytkownicy.php";
            } else {
                error.style.display = "block";
                error.textContent = data;
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
};