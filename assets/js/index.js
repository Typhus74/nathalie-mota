console.log("js chargé");

//* Navigation menu burger mobile

const header = document.querySelector('header');
const menuBurger = document.querySelector('.menu-burger');
const nav = document.querySelector('.navigation');
const liens = document.querySelectorAll('.navigation--menu li a')

menuBurger.addEventListener('click', () => {
    header.classList.toggle('open');
    menuBurger.classList.toggle('open');
    nav.classList.toggle('open');

});
