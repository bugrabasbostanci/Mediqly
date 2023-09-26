const searchInput = document.getElementById("search");
const cardContainer = document.querySelector(".card-container");

let medicineDatas;
// FETCH
fetch("./data/simplified-medicines.json")
  .then((response) => response.json())
  .then((data) => {
    medicineDatas = data;
    searchData(medicineDatas);
    showData(medicineDatas);
  });

// SEARCH
function searchData() {
  searchInput.addEventListener("keyup", (e) => {
    const searchData = e.target.value.toLowerCase();
    const filteredData = medicineDatas.filter((item) =>
      item.name.toLowerCase().includes(searchData)
    );
    showData(filteredData);
  });
}

// CREATING COMPONENT w/ DATA
function showData(items) {
  cardContainer.innerHTML = items
    .map((item) => {
      return `
  <div class="card">
    <!-- medicine image -->
            <img
              src=${item.imageURL}
              alt=""
              class="thumbnail"
            />
            <!-- medicine informations -->
            <div class="description">
              <h2 class="medicine-title">${item.name}</h2>
              <p class="medicine-purpose">
                ${item.purpose}
              </p>
              <p class="medicine-instruction">
                ${item.instruction}
              </p>
              <a href="" class="more-info">Daha fazla bilgi için tıklayınız</a>
            </div>
    </div>
    `;
    })
    .join("");
}
