// =================================== Carusel noticias ========================================
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

//CAMBIO DE SITIO IMAGENES DE LOS ARTICULOS CENTRALES
const imgMedioArriba = document.getElementById("img-medio-arriba");
const imgMedioAbajo = document.getElementById("img-medio-abajo");

if(window.innerWidth < 870){
    imgMedioArriba.style.display = "none";
    imgMedioAbajo.style.display = "block";
    anchoContenedor = window.innerWidth * 0.90;
    visibleSlides = 1;
    slideWidth = anchoContenedor/visibleSlides - anchoContenedor/visibleSlides * 0.01;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/1.77}px`
    });
}
else if(window.innerWidth < 1100){
    imgMedioArriba.style.display = "block";
    imgMedioAbajo.style.display = "none";
    anchoContenedor = window.innerWidth * 0.80;
    visibleSlides = 2;
    slideWidth = anchoContenedor/visibleSlides - anchoContenedor/visibleSlides * 0.01;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/1.77}px`
    });}
else{
    imgMedioArriba.style.display = "block";
    imgMedioAbajo.style.display = "none";
    anchoContenedor = window.innerWidth * 0.80;
    visibleSlides = 3;
    slideWidth = anchoContenedor/visibleSlides - anchoContenedor/visibleSlides * 0.01;
    imagenesNoticias.forEach(img => {
        img.style.height = `${slideWidth/1.77}px`
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

// ===================================== ACABA CARRUSEL NOTICIAS ================================================
// ================================== ESTABLECER ALTURA FOTOS INICIO =========================================
const fotosInicio = document.querySelectorAll(".img-inicio");
let alturaFoto;
fotosInicio.forEach(img => {
    alturaFoto = Math.round(img.width / 1.5);
    img.style.height = `${alturaFoto}px`
});
