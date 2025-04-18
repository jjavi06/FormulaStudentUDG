console.log("Made by: Javier Granados - Contact: jmelekhov@gmail.com");
//MOVIMIENTO DE LA CABECERA
//Comprobar que dispositivo es: 
const esMovil = /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent);
const esTablet = /Tablet|iPad/i.test(navigator.userAgent);

const header = document.querySelector("header");
let headerShrunk = false;

//Si detecta que el dispositivo es un movil, al tocar la pantalla y mover se hace el header mas pequeño, 
//en caso de ser otro dispositivo, lo hace al hacer scroll.
if(esMovil || esTablet){
  if(!headerShrunk){
    window.addEventListener('touchmove', () =>{
      header.classList.add("shrink");
      headerShrunk = true;
      document.querySelector("body").style.paddingTop = "17%";
    });
  }
}
else{
  window.addEventListener("scroll", () => {
    if (!headerShrunk && window.scrollY > 50) {
      header.classList.add("shrink");
      headerShrunk = true;
    }
  });
}


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

//menu hamburguesa
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const headerHeight = header.offsetHeight;
navLinks.style.paddingTop = `${headerHeight+25}px`;

hamburger.addEventListener('click', () => {
  if(document.querySelector("show"))
    setTimeout(3000, navLinks.classList.toggle('show'))
  else
    navLinks.classList.toggle('show');
});

//Poner tamaño al menú hamburguesa
const alturaPantalla = screen.innerHeight;
const linksHamburguesa = document.querySelector(".hamburger-links .nav-links");

linksHamburguesa.style.height = `${alturaPantalla}px`;


//CAMBIAR DE MENÚ NORMAL A MENÚ HAMBURGUESA
const menuSimple = document.querySelector(".menu");
const menuHamburguesa = document.querySelector(".navbar");
const seccionCentral = document.querySelector("section");
const logos = document.querySelectorAll(".logo");
const cocheLogo = document.getElementById("headerCar");

if(window.innerWidth <= 870){
  menuSimple.style.display = "none";
  menuHamburguesa.style.display = "block";
  // seccionCentral.style.padding = "3% 5%";
  logos.forEach(logo => {
    logo.classList.add("logo-movil");
    logo.classList.remove("logo");
  });
  cocheLogo.classList.add("carLogo-movil");
  cocheLogo.classList.remove("carLogo");
}
else{
  menuSimple.style.display = "block";
  menuHamburguesa.style.display = "none";
  seccionCentral.style.padding = "5%";
}

