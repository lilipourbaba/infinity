const parent = document.querySelectorAll(".menu-item-has-children");
const submenu = document.querySelector(".sub-menu-back");

// function appendSubMenu() {
//     if (submenu && parent) {
//         parent.appendChild(submenu);

//     } else {
//         return
//     }
// }
// appendSubMenu()
parent.forEach((elem) => {
  elem.addEventListener("mouseenter", (e) => {
    submenu.classList.add("active");
  });
    elem.addEventListener("mouseleave", (e) => {
      submenu.classList.remove("active");
    });
});


// parent.forEach((elem) => {
//   elem.addEventListener("mouseleave", (e) => {
//     submenu.classList.add("active");
//   });
// });


// parent.addEventListener("mouseleave", (e) => {
//   submenu.classList.remove("active");
// });

// opentab.forEach((elem) => {
//   elem.addEventListener("click", () => {
//     elem.classList.toggle("active");
//   });
// });
