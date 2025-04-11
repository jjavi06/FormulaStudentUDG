console.log("Made by: Javier Granados - Contact: jmelekhov@gmail.com");
//MOVIMIENTO DE LA CABECERA
const header = document.querySelector("header");
let headerShrunk = false;


// Se achica el header solo una vez al hacer scroll
window.addEventListener("scroll", () => {
  if (!headerShrunk && window.scrollY > 50) {
    header.classList.add("shrink");
    headerShrunk = true;
  }
});

//MOVIMIENTO FOOTER
const footerContent = document.querySelector(".contenido-footer");

window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;
  const windowHeight = window.innerHeight;
  const pageHeight = document.body.scrollHeight;

  const distanceToBottom = pageHeight - (scrollY + windowHeight);

  if (distanceToBottom < 60) {
    footerContent.classList.add("visible");
  } else {
    footerContent.classList.remove("visible");
  }
});

// //menu hamburguesa
// const hamburger = document.getElementById('hamburger');
// const navLinks = document.getElementById('nav-links');
// const span = document.querySelectorAll(".hamburger span");

// hamburger.addEventListener('click', () => {
//   navLinks.classList.toggle('show');
//   span.forEach(span => {
//     span.style.backgroundColor = navLinks.classList.contains('show') ? 'white' : 'darkblue';
//   });
// });