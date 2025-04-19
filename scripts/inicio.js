const imagenesInicio = new Array("1", "2", "3", "4");
const fotoInicio = document.getElementById("foto");
let numFoto = 1;
const intervalTime = 3000; // Cambia cada 3 segundos

window.addEventListener('load', function(){
    fotoInicio.src = `/racingdivision/img/carrusel-inicio${numFoto}.jpg`;
});

function nextImage() {
    numFoto++;
    if (numFoto == 5) {
        numFoto = 1;
    }
    fotoInicio.src = `/racingdivision/img/carrusel-inicio${numFoto}.jpg`;
    // console.log(fotoInicio.src);
    // console.log(`Numero de la foto: ${numFoto}`);
}

setInterval(nextImage, intervalTime);




// Carusel noticias
const nextbtn = document.querySelector(".next-btn");
const prevbtn = document.querySelector(".prev-btn");
const slidesContainer = document.querySelector("#noticias .slides-container");
const slides = document.querySelectorAll("#noticias .slide");
const imagenesNoticias = document.querySelectorAll("#noticias img");
let current;
let autoSlideInterval;

let slideWidth; //anchura de cada noticia con padding incluido
let visibleSlides; // número de slides visibles a la vez
let anchoContenedor; //ancho pantalla para saber nº de noticias vistas a la vez

if(window.innerWidth < 870){
    anchoContenedor = window.innerWidth * 0.90;
    visibleSlides = 1;
    slideWidth = anchoContenedor/visibleSlides;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/2}px`
    });
}
else if(window.innerWidth < 1100){
    anchoContenedor = window.innerWidth * 0.80;
    visibleSlides = 2;
    slideWidth = anchoContenedor/visibleSlides;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/2}px`
    });}
else{
    anchoContenedor = window.innerWidth * 0.80;
    visibleSlides = 3;
    slideWidth = anchoContenedor/visibleSlides;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/2}px`
    });}
//console.log(`Ancho Contenedor: ${anchoContenedor}, Slide Width: ${slideWidth} `);

// Inicialización del carrusel
function initCarousel() {
    // Mostrar todos los slides y configurar el contenedor
    slides.forEach(slide => {
        slide.style.display = "block";
        slide.style.minWidth = `${slideWidth}px`;
    });
    
    // Configurar el ancho del contenedor
    slidesContainer.style.width = `${anchoContenedor}px`;
    slidesContainer.style.transform = `translateX(0px)`;
    current = 0;
    // Iniciar el desplazamiento automático
    startAutoSlide();
}

// Función para mover al slide específico
function goToSlide(index) {
    // Asegurarse de que el índice esté dentro de los límites
    if (index < 0) index = 0;
    if (index > slides.length - visibleSlides) index = 0; 
    
    current = index;
    const offset = -current * slideWidth;
    //console.log(offset);
    slidesContainer.style.transform = `translateX(${offset}px)`;
    slidesContainer.style.transition = "transform 0.5s ease";
}

// Función para avanzar al siguiente slide
function nextSlide() {
    stopAutoSlide();
    goToSlide(current + 1);
    startAutoSlide();
}

// Función para retroceder al slide anterior
function prevSlide() {
    stopAutoSlide();
    goToSlide(current - 1);
    startAutoSlide();
}

// Iniciar el cambio automático
function startAutoSlide() {
    stopAutoSlide(); // Detener cualquier intervalo existente
    autoSlideInterval = setInterval(nextSlide, 3000); // 4 segundos
}

// Detener el cambio automático
function stopAutoSlide() {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
    }
}

// Eventos de escucha para botones carrusel
nextbtn.addEventListener('click', function() {
    nextSlide();
});

prevbtn.addEventListener('click', function() {
    prevSlide();
});

// Pausar cuando el ratón está sobre el carrusel
slidesContainer.addEventListener('mouseenter', stopAutoSlide);
slidesContainer.addEventListener('mouseleave', startAutoSlide);

// Inicializar el carrusel cuando la ventana se carga
window.addEventListener('load', initCarousel);

// ACABA CARRUSEL NOTICIAS

// CAMBIAR TAMAÑO CARRUSEL CENTRAL
const screenWidth = window.innerWidth;
let dividirAnchura;
if(screenWidth <= 870)
    dividirAnchura = 1.6;
else dividirAnchura = 2.3;
document.addEventListener("DOMContentLoaded", () => {
    const alturaCarrusel = Math.round(screenWidth * 0.8 / dividirAnchura); //0.8 para el 80% de la pantalla que ocupa el carrusel y 2.3 para ajustar la medida
    const carrusel = document.querySelector(".carousel");
    if (carrusel) {
      carrusel.style.height = `${alturaCarrusel}px`;
    }
  });
