let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

const homePage = [
  'assets/home-page-1.png',
  'assets/home-page-2.jpg',
  'assets/home-page-3.png'
];

const assets = [
  'assets/dishes-1.png',
  'assets/dishes-2.png',
  'assets/dishes-3.png',
  'assets/dishes-4.png',
  'assets/dishes-5.png',
  'assets/dishes-6.png',
];

homePage.forEach((homePage, index) => {
  let element = document.getElementById(`homepage-${index + 1}`);
  if (element) {
    let img = new Image();
    img.src = homePage;
    img.onload = function() {
      element.src = img.src;
    };
    img.onerror = function() {
      console.error('Gagal memuat gambar:', img.src);
    };
  }
});

assets.forEach((assets, index) => {
  let element = document.getElementById(`assets-${index + 1}`);
  element.src = assets;
});

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

window.onscroll = () => {
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
}

document.querySelector('#bars').onclick = () => {
  document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () => {
  document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop:true,
    });
 

