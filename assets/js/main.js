const searchInput = document.getElementById("search");
const cardContainer = document.querySelector(".cards-container");

let medicineDatas;
// FETCH
fetch("./assets/data/medicines.json")
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
  // TODO BUNU DENE BİR DE FONKSİYON YERİNE
  // const star = "<i class='fa-solid fa-star'></i>";
  // ${star.repeat(item.power)}
  cardContainer.innerHTML = items
    .map((item) => {
      const stars = item.power > 0 ? item.power : 1;

      // Create stars
      const starIcons = Array.from(
        { length: stars },
        () => '<i class="fa-solid fa-star"></i>'
      ).join("");

      return `
      <div class="card">
      <!-- image -->
      <div class="image-container">
        <a href="null">
          <img
            class="medicine-image"
            src="${item.imageURL}"
            alt="${item.name}"
          />
        </a>
      </div>
      <!-- labels, icons and rates -->
      <div class="status-container">
        <!-- labels -->
        <div class="label-container">
          <span class="medicine-tag">${item.category}</span>
        </div>
        <!-- icons -->
        <div class="icon-container">
          <i class="fa-solid fa-${item.method}" title="${item.methodTitle}"></i>
          <i class="fa-solid fa-${item.ageA}" title="Yetişkinler içindir"></i>
          <i class="fa-solid fa-${item.ageC}" title="Çocuklar içindir"></i> 
        </div>
        <!-- rates -->
        <div class="rate-container" title="${item.powerTitle}">
          ${starIcons}
        </div>
      </div>
      <!-- informations -->
      <div class="information-container">
        <h1 class="medicine-name">${item.name}</h1>
        <p class="medicine-purpose">
          <b>Ne için kullanılır:</b> ${item.purpose}
        </p>
        <p class="medicine-instruction">
          <b>Nasıl kullanılır:</b> ${item.instruction}
        </p>
        <p class="medicine-warning">
          <i class="fa-solid fa-triangle-exclamation"></i>
          Kullanmadan önce prospektüse bakın
          <i class="fa-solid fa-triangle-exclamation"></i>
        </p>
        <a href="${item.prescription}" class="medicine-prescription" target="_blank">
          <button>Prospektüsü İncele</button>
        </a>
      </div>
    </div>
    `;
    })
    .join("");
}

// data = fetch('http:/localhost:8000/data')
// data.map(() => {
//   return(
//     {/* CARD */}
//     <div>
//         <a href={data.slug}>Prospektüsü incele</a>
//     <div>
//   )
// })
