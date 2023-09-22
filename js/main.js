const form = document.getElementById("form");
const input = document.getElementById("search");
const cardContainer = document.querySelector(".card-container");

function showData(data) {
  data.map((element) => {
    const divCard = document.createElement("div");
    divCard.innerHTML = `
            <!-- medicine image -->
            <img
              src=${element.imageURL}
              alt=""
              class="thumbnail"
            />
            <!-- medicine informations -->
            <div class="description">
              <h2 class="medicine-title">${element.name}</h2>
              <p class="medicine-purpose">
                ${element.purpose}
              </p>
              <p class="medicine-instruction">
                ${element.instruction}
              </p>
              <a href="" class="more-info">Daha fazla bilgi için tıklayınız</a>
            </div>
      `;
    divCard.setAttribute("class", "card");
    cardContainer.appendChild(divCard);
  });
}

fetch("./data/medicines.json")
  .then((response) => response.json())
  .then((data) => showData(data));

form.addEventListener("submit", (e) => {
  e.preventDefault();

  cardContainer.innerHTML = " ";

  const searchItem = input.value;

  if (searchItem) {
    showData(searchItem);
    input.value = " ";
  }
});
