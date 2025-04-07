const imagenesInicio = new Array("img/inicio1.png", "img/inicio2.png", "img/inicio3.png", "img/inicio4.png");
const fotoInicio = document.getElementById("foto");
let numFoto = 0;
const intervalTime = 3000; // Cambia cada 3 segundos

window.addEventListener('load', function(){
    fotoInicio.src = imagenesInicio[numFoto];
    //console.log(numFoto);
});

function nextImage() {
    numFoto++;
    if (numFoto == imagenesInicio.length) {
        numFoto = 0;
    }
    fotoInicio.src = imagenesInicio[numFoto];
}

setInterval(nextImage, intervalTime);


//MOVIMIENTO DE LA CABECERA
const header = document.querySelector("header");
const expandBtn = document.querySelector(".expand-btn");
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

//manu hamburguesa
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const span = document.querySelectorAll(".hamburger span");

hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('show');
  span.forEach(span => {
    span.style.backgroundColor = navLinks.classList.contains('show') ? 'white' : 'darkblue';
  });
});