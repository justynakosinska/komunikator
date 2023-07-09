
const form = document.querySelector(".writeames"),
id_otrzymane = form.querySelector(".id_otrzymane").value,
input = form.querySelector(".input"),
btn = form.querySelector("button"),
chat = document.querySelector(".chatArea");

form.onsubmit = (e) => {
  e.preventDefault();
};

input.onkeyup = () => {
  if (input.value != "") {
    btn.classList.add("active");
  } else {
    btn.classList.remove("active");
  }
};

btn.onclick = () => {
  const formData = new FormData(form);

  fetch("php/wiadomosc.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then(() => {
      input.value = "";
      scrollToBottom();
    })
    .catch((error) => console.error(error));
};

chat.onmouseenter = () => {
  chat.classList.add("active");
};

chat.onmouseleave = () => {
  chat.classList.remove("active");
};

setInterval(() => {
  fetch("php/pobierz-wiad.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "id_otrzymane=" + id_otrzymane,
  })
    .then((response) => response.text())
    .then((data) => {
      chat.innerHTML = data;
      if (!chat.classList.contains("active")) {
        scrollToBottom();
      }
    })
    .catch((error) => console.error(error));
}, 500);

function scrollToBottom() {
  chat.scrollTop = chat.scrollHeight;
}
