const search = document.querySelector(".searchBar input");
const btn = document.querySelector(".searchBar button");
const listofAccounts = document.querySelector(".listOfAccounts");

btn.onclick = () => {
    search.classList.toggle("show");
    search.classList.toggle("active");
    search.focus();

    if (search.classList.contains("active")) {
        search.value = "";
        search.classList.remove("active");
    }
};

search.onkeyup = () => {
    if (search.value != "") {
        search.classList.add("active");
    } else {
        search.classList.remove("active");
    }

    fetch("php/szukanie.php", {
        method: "POST",
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            szukanyUżytkownik: search.value
        }).toString()
    })
        .then(response => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Network response was not OK.");
        })
        .then(data => {
            listofAccounts.innerHTML = data;
        })
        .catch(error => {
            console.error("Error:", error);
        });
};

search.onkeyup();
