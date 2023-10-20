// var map = L.map("map").setView([38.3942656, 27.164672], 13);

// L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
//   maxZoom: 19,
//   attribution:
//     '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
// }).addTo(map);

// var marker = L.marker([38.383164, 27.179119]).addTo(map);

const btn = document.getElementById("btn");

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    function (position) {
      const { latitude } = position.coords;
      const { longitude } = position.coords;
      // console.log(`https://www.google.com/maps/@${latitude},${longitude}`);
      // console.log(
      //   `https://www.google.com/maps/search/Eczaneler/@${latitude},${longitude}`
      // );
      btn.setAttribute(
        "href",
        `https://www.google.com/maps/search/Eczaneler/@${latitude},${longitude}`
      );
      console.log(latitude, longitude);
    },

    function () {
      alert(`Could not get your position`);
    }
  );
}

/////////////////////////////////////////

// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(
//       function (position) {
//         const { latitude } = position.coords;
//         const { longitude } = position.coords;
//         console.log(`https://www.google.com/maps/@${latitude},${longitude}`);
//         console.log(
//           `https://www.google.com/maps/search/Eczaneler/@${latitude},${longitude}`
//         );

//         const coords = [latitude, longitude];

//         const map = L.map("map").setView(coords, 13);

//         L.tileLayer("https://tile.openstreetmap.fr/hot/{z}/{x}/{y}.png", {
//           attribution:
//             '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
//         }).addTo(map);

//         L.marker(coords)
//           .addTo(map)
//           .bindPopup("A pretty CSS popup.<br> Easily customizable.")
//           .openPopup();
//       },

//       function () {
//         alert(`Could not get your position`);
//       }
//     );
//   }

// YAPMAM GEREKEN ŞEY
// https://www.google.com/maps/search/Eczaneler/@ "[38.4934803,27.6951042]"

// Kullanıcının location değerini al ve lat-lng yerine onu yaz
