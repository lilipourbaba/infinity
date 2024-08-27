/** Home faq **/
jQuery(document).ready(($) => {
  const faqItem = $(".home-faq .faq-item");
  const faqTitle = $(".home-faq .faq-item .faq-title");
  const faqContent = $(".home-faq .faq-item .faq-content");

  $(faqTitle).on("click", (e) => {
    e.preventDefault();

    const nextContent = $(e.target).next();
    const parentItem = $(e.target).parent(".faq-item");

    if ($(parentItem).hasClass("active")) {
      // deactivate current item
      $(nextContent).slideUp(250);
      $(parentItem).removeClass("active");
    } else {
      // deactivate all items
      $(faqContent).slideUp(250);
      $(faqItem).removeClass("active");
      // active current item
      $(nextContent).slideDown(250);
      $(parentItem).addClass("active");
    }
  });
});

/** Blog page term select **/
jQuery(document).ready(($) => {
  $("#blog-head-term-select").on("change", (e) => {
    e.preventDefault();
    const termVal = e.target.value;
    window.open(termVal, "_self");
  });
});

/** Single product page sizes guide modal **/
jQuery(document).ready(($) => {
  const sizesGuideModal = $("#sizes-guide-modal")[0];
  if (!sizesGuideModal)
    return;

  $("#sizes-guide-open").on("click", (e) => {
    e.preventDefault();

    if (!$(sizesGuideModal).hasClass("active")) {
      $(sizesGuideModal).addClass("active");
      $(document.body).css("overflow", "hidden");
    }
  });

  $("[data-action='close-sizes']").on("click", (e) => {
    e.preventDefault();

    if ($(e.target).attr("data-action") === "close-sizes") {
      $(sizesGuideModal).removeClass("active");
      $(document.body).attr("style", "");
    }
  });
});

/* Login Page */
jQuery(document).ready(($) => {
  function objectifyFormArray(formArray) {
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
      returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
  }

  const getPhoneForm = $("#login-get-phone");
  const getOTPForm = $("#login-get-otp");
  const formLoader = $("#login-form-loader");
  const formsData = {
    nickname: undefined,
    phone: undefined
  }

  if (getPhoneForm)
    $(getPhoneForm).on("submit", (e) => {
      e.preventDefault();
      $(formLoader).show();

      const formDataArray = $(getPhoneForm).serializeArray();
      const formData = objectifyFormArray(formDataArray);
      formsData.phone = formData.phone;
      formsData.nickname = formData.nickname;

      $.ajax({
        url: cyn_head_script.url,
        type: 'post',
        data: {
          action: 'login_get_phone',
          _nonce: cyn_head_script.nonce,
          data: formData,
        },
        success: (res) => {
          $(getPhoneForm).hide();
          $(getOTPForm).show();
        },
        error: (err) => {
          if (Array.isArray(err.responseJSON.msgs))
            return window.alert(err.responseJSON.msgs[0]);

          window.alert("خطایی به وجود آمده. لطفا بعدا دوباره امتحان کنید");
        },
        complete: () => {
          $(formLoader).hide();
        }
      });
    });

  if (getOTPForm)
    $(getOTPForm).on("submit", (e) => {
      e.preventDefault();
      $(formLoader).show();

      const formData = {
        otp_pass: $("#otp_pass").val(),
        phone: formsData.phone,
        nickname: formsData.nickname
      }

      $.ajax({
        url: cyn_head_script.url,
        type: 'post',
        data: {
          action: 'cyn_login_get_otp',
          _nonce: cyn_head_script.nonce,
          data: formData,
        },
        success: (res) => {
          if (res.url)
            window.location.replace(res.url);
          else
            window.location.reload();
        },
        error: (err) => {
          if (Array.isArray(err.responseJSON.msgs))
            return window.alert(err.responseJSON.msgs[0]);

          window.alert("خطایی به وجود آمده. لطفا بعدا دوباره امتحان کنید");
        },
        complete: () => {
          $(formLoader).hide();
        }
      });
    });
});
