const searchInput = document.getElementById("search");
const cardContainer = document.querySelector(".card-container");

// 1-FETCH
// fetch("./data/medicines.json")
//   .then((response) => response.json())
//   .then((data) => showData(data));

// 2-SEARCH const allData = data;
// form.addEventListener("submit", (e) => {
//   e.preventDefault();

//   cardContainer.innerHTML = "";

//   const searchItem = searchInput.value;

//   if (searchItem) {
//     showData(searchItem);
//     searchInput.value = " ";
//   }
// });

// 3-DATA USING AND CARD CREATE
// function showData(data) {
//   data.map((element) => {
//     const divCard = document.createElement("div");
//     divCard.innerHTML = `
//             <!-- medicine image -->
//             <img
//               src=${element.imageURL}
//               alt=""
//               class="thumbnail"
//             />
//             <!-- medicine informations -->
//             <div class="description">
//               <h2 class="medicine-title">${element.name}</h2>
//               <p class="medicine-purpose">
//                 ${element.purpose}
//               </p>
//               <p class="medicine-instruction">
//                 ${element.instruction}
//               </p>
//               <a href="" class="more-info">Daha fazla bilgi için tıklayınız</a>
//             </div>
//       `;
//     divCard.setAttribute("class", "card");
//     cardContainer.appendChild(divCard);
//   });
// }

// TEST

let medicineDatas;

fetch("./data/medicines.json")
  .then((response) => response.json())
  .then((data) => {
    medicineDatas = data;
    searchData(medicineDatas);
    showData(medicineDatas);
  });

function searchData() {
  searchInput.addEventListener("keyup", (e) => {
    const searchData = e.target.value.toLowerCase();
    const filteredData = medicineDatas.filter((item) =>
      item.name.toLowerCase().includes(searchData)
    );
    showData(filteredData);
  });
}

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
