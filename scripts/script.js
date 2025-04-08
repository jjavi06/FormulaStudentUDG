const imagenesInicio = new Array("1", "2", "3", "4");
const fotoInicio = document.getElementById("foto");
let numFoto = 1;
const intervalTime = 3000; // Cambia cada 3 segundos

window.addEventListener('load', function(){
    fotoInicio.src = `/UdgRacingDivision/img/inicio${numFoto}.png`;
});

function nextImage() {
    numFoto++;
    if (numFoto == 5) {
        numFoto = 1;
    }
    if(numFoto==1)
      fotoInicio.src = `/UdgRacingDivision/img/inicio${numFoto}.png`;
    else
    fotoInicio.src = `/UdgRacingDivision/img/inicio${numFoto}.JPG`;
    console.log(fotoInicio.src);
    console.log(`Numero de la foto: ${numFoto}`);
}

setInterval(nextImage, intervalTime);


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