const cardContainer = document.querySelector(".card-container");

// const hide = () => (cardContainer.style.display = "none");

document.addEventListener("keyup", function (e) {
  if (e.key === "Enter") {
    cardContainer.style.display = "none";
  }
});
