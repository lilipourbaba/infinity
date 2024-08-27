import Swiper from 'swiper/bundle';

const autoplay = {
  delay: 3250,
  disableOnInteraction: false,
  pauseOnMouseEnter: true
};

export const homeHeadSlider = new Swiper('#home-head-slider', {
  effect: "fade",
  loop: true,
  spaceBetween: 16,
  centeredSlides: true,
  autoplay,
  autoHeight: true,
});

export const productsSwiper = new Swiper('.swiper-products', {
  slidesPerView: 1.25,
  spaceBetween: 16,
  /*
  loop: true,
  autoplay,
  */
  breakpoints: {
    576: {
      slidesPerView: 2.25,
    },
    768: {
      slidesPerView: 3.15,
    },
    1024: {
      slidesPerView: 3.25,
    },
    1240: {
      slidesPerView: 4.15,
    },
  },
  navigation: {
    nextEl: '.swiper-btn-next',
    prevEl: '.swiper-btn-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
});

export const postsSwiper = new Swiper('.swiper-blog', {
  slidesPerView: 1.25,
  spaceBetween: 16,
  /*
  loop: true,
  autoplay,
  */
  breakpoints: {
    576: {
      slidesPerView: 2.25,
    },
    1240: {
      slidesPerView: 3.25,
    },
  },
  navigation: {
    nextEl: '.swiper-btn-next',
    prevEl: '.swiper-btn-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
});

export const singleProductThumbs = new Swiper('#single-product-thumbs', {
  spaceBetween: 16,
  slidesPerView: 3.35,
  freeMode: true,
  watchSlidesProgress: true,
});

export const singleProductGallery = new Swiper('#single-product-gallery', {
  slidesPerView: 1,
  spaceBetween: 16,
  autoHeight: true,
  thumbs: {
    swiper: singleProductThumbs,
  },
  navigation: {
    nextEl: '.swiper-btn-next',
    prevEl: '.swiper-btn-prev',
  }
});

export const blogHeadSlider = new Swiper('#blog-head-slider', {
  loop: true,
  spaceBetween: 16,
  centeredSlides: true,
  autoplay,
  autoHeight: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
});
