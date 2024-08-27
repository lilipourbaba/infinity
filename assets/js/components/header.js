/** Open/Close Desktop Search Box **/
jQuery(document).ready(($) => {
  const openSearchBtn = $("#open-header-search");

  $(openSearchBtn).on("click", (e) => {
    e.preventDefault();
    e.stopPropagation();

    const inputGroup = $(openSearchBtn).next();

    $(inputGroup).fadeToggle(
      250,
      "linear",
      () => {
        if ($(inputGroup).hasClass("active"))
          $(inputGroup).removeClass("active");
        else
          $(inputGroup).addClass("active");
      }
    );
  });
});

/** Open/Close Mobile Elements **/
jQuery(document).ready(($) => {
  /** Open/Close Modal **/
  const openMobileMenu = $("#header-mobile #open-mobile-menu");
  const menuModal = $("#header-mobile #mobile-menu-modal");
  const closeModal = $("#header-mobile [data-action='close']");

  $(openMobileMenu).on("click", (e) => {
    if (!$(menuModal).hasClass("active")) {
      $(menuModal).addClass("active");
      $(document.body).css("overflow", "hidden");
    }
  });

  $(closeModal).on("click", (e) => {
    if ($(e.target).attr("data-action") === "close") {
      $(menuModal).removeClass("active");
      $(document.body).attr("style", "");
    }
  });
});
const header_mobile = document.querySelectorAll(".menu-item-has-children");
  console.log(header_mobile);


header_mobile.forEach((elem) => {
   elem.addEventListener("click", () => {
     elem.classList.toggle("active");
   });
 });
