console.log("Made by: Javier Granados - Contact: jmelekhov@gmail.com");
if(window.innerWidth<500)
  document.getElementById("createdBy").innerHTML = "Created by Javier Granados<br>Contact: jmelekhov@gmail.com";

// ======================================= MOVIMIENTO DE LA CABECERA ==============================================
//Comprobar que dispositivo es: 
const esMovil = /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent);
const esTablet = /Tablet|iPad/i.test(navigator.userAgent);

const header = document.querySelector("header");
let headerShrunk = false;

//Selección del body y altura del header para hacer modificaciones según el dispositivo
//Las modificaciones se hacen al final del documento en la comprovación de la screen Width y en headerShrunk
const body = document.querySelector("body");
let alturaHeader = header.offsetHeight;

//Si detecta que el dispositivo es un movil, al tocar la pantalla y mover se hace el header mas pequeño, 
//en caso de ser otro dispositivo, lo hace al hacer scroll.
if(esMovil || esTablet){
  if(!headerShrunk){
    window.addEventListener('touchmove', () =>{
      header.classList.add("shrink");
      headerShrunk = true;
      //Modificación de la distancia de la section al header
      if(screen.width < 870)
        document.querySelector("body").style.paddingTop = `${alturaHeader+20}px`;
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

//Footer movil
const footerMovil = document.getElementById("footer-movil");

if(window.innerWidth <= 870){
  menuSimple.style.display = "none";
  menuHamburguesa.style.display = "block";
  logos.forEach(logo => {
    logo.classList.add("logo-movil");
    logo.classList.remove("logo");
  });
  cocheLogo.classList.add("carLogo-movil");
  cocheLogo.classList.remove("carLogo");
  //Cambiar a footer movil
  footerContent.style.display = "none";
  footerMovil.style.display = "block";
  //Aplicar distancia de la sección al header
  body.style.paddingTop = `${alturaHeader+40}px`;
}
else{
  menuSimple.style.display = "block";
  menuHamburguesa.style.display = "none";
  //Cambiar a footer normal
  footerMovil.style.display = "none";
  footerContent.style.display = "flex";
}

// ======================== CAMBIOS DE IDIOMA ==============================
// Detectar si ya hay un idioma guardado
const savedLang = localStorage.getItem("lang") || "es";
loadLanguage(savedLang);

// Actualizar el <select> para reflejar el idioma guardado
const languageSelect = document.getElementById("language-select");
if (languageSelect) {
  languageSelect.value = savedLang;
}

// CAMBIOS DE IDIOMA
languageSelect.addEventListener("change", function () {
  const lang = this.value;
  localStorage.setItem("lang", lang);  // Guardar selección
  loadLanguage(lang);                  // Aplicar traducción
});

function loadLanguage(lang) {
  fetch(`/racingdivision/lang/${lang}.json`)
    .then(res => res.json())
    .then(translations => applyTranslations(translations))
    .catch(err => console.error("Error cargando idioma:", err));
}

function applyTranslations(data) {
  const elements = document.querySelectorAll("[data-i18n]");
  elements.forEach(el => {
    const keys = el.getAttribute("data-i18n").split(".");
    let text = data;
    for (const key of keys) {
      if (text && key in text) {
        text = text[key];
      } else {
        text = null;
        break;
      }
    }
    if (text) {
      el.textContent = text;
    }
  });
}
