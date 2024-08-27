/** Product archive sidebar on change **/
jQuery(document).ready(($) => {
  $("#archive-product-filter-form button").on("click", (e) => {
    const catId = $(e.target).attr("data-cat");
    const tax = $(e.target).attr("data-tax");

    const catsInput = $("#archive-product-filter-form input[name='cats']")[0];
    const agesInput = $("#archive-product-filter-form input[name='ages']")[0];
    const colorsInput = $("#archive-product-filter-form input[name='colors']")[0];

    if (!catsInput || !agesInput || !colorsInput)
      return;

    let taxInput;
    switch (tax) {
      case "cats":
        taxInput = catsInput;
        break;
      case "ages":
        taxInput = agesInput;
        break;
      case "colors":
        taxInput = colorsInput;
        break;
      default:
        taxInput = catsInput;
        break;
    }

    const catsValue = $(taxInput).attr("value");
    const btnVariant = $(e.target).attr("variant");
    if (btnVariant == "secondary") {
      $(e.target).attr("variant", "text-light");
      $(taxInput).attr("value", catsValue.replaceAll(catId + ",", ""));
    } else {
      $(e.target).attr("variant", "secondary");
      $(taxInput).attr("value", catsValue + catId + ",");
    }
    taxInput.dispatchEvent(new Event("change"));
  });

  $("#product-archive-ordering input[name='orderby']").on("change", (e) => {
    const orderby = $(e.target).attr("value");
    const orderbyInput = $("#archive-product-filter-form input[name='orderby']")[0];

    if (!orderbyInput)
      return;

    $(orderbyInput).attr("value", orderby);
    orderbyInput.dispatchEvent(new Event("change"));
  });

  $("#archive-product-filter-form input[type='hidden']").on("change", (e) => {
    $("#archive-product-filter-form").submit();
  });

  $("#clear-archive-product-filter").on("click", (e) => {
    $("#archive-product-filter-form input[type='hidden']:not([name='page'])").attr("value", "");
    $("#archive-product-filter-form").submit();
  });

  // open sidebar mobile
  $("#mobile-show-sidebar").on("click", (e) => {
    e.preventDefault();
    const sidebar = $(".archive-sidebar")[0];
    if (!sidebar)
      return;

    if (!$(sidebar).hasClass("active")) {
      $(sidebar).addClass("active");
      $(document.body).css("overflow", "hidden");
    }
  });

  // close sidebar mobile
  $(".archive-product [data-action='close']").on("click", (e) => {
    if ($(e.target).attr("data-action") === "close") {
      e.preventDefault();
      const sidebar = $(".archive-sidebar")[0];
      if (!sidebar)
        return;

      $(sidebar).removeClass("active");
      $(document.body).attr("style", "");
    }
  });
});

/** Product archive description open **/
jQuery(document).ready(($) => {
  const termDescription = $("#term-description");
  const termDescriptionContent = $("#term-description > .term-description-content");
  const termDescriptionOpener = $("#term-description-opener");

  if (termDescription && termDescriptionOpener) {
    $(termDescriptionOpener).on("click", (e) => {
      e.preventDefault();
      const target = e.target;
      const contentH = $(termDescriptionContent).outerHeight();

      $(termDescription).css('height', contentH);
      $(target).remove();
    });
  }
});