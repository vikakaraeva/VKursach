const slider = document.querySelector(".swiper-container");

let mySwiper = new Swiper(slider, {
  slidesPerView: 5,
  spaceBetween: 10,
  loop: true,
  lazy: {
    loadPrevNext: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
