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
    // console.log(fotoInicio.src);
    // console.log(`Numero de la foto: ${numFoto}`);
}

setInterval(nextImage, intervalTime);




// Carusel noticias
const nextbtn = document.querySelector(".next-btn");
const prevbtn = document.querySelector(".prev-btn");
const slidesContainer = document.querySelector("#noticias .slides-container");
const slides = document.querySelectorAll("#noticias .slide");
let current = 0;
const slideWidth = 33;
let autoSlideInterval;
const visibleSlides = 3; // número de slides visibles a la vez


// Inicialización del carrusel
function initCarousel() {
    // Mostrar todos los slides y configurar el contenedor
    slides.forEach(slide => {
        slide.style.display = "block";
        slide.style.minWidth = `${slideWidth / 3}%`;
    });
    
    // Configurar el ancho del contenedor
    slidesContainer.style.width = `${slideWidth * slides.length}%`;
    
    // Iniciar el desplazamiento automático
    startAutoSlide();
}

// Función para mover al slide específico
function goToSlide(index) {
    // Asegurarse de que el índice esté dentro de los límites
    if (index < 0) index = slides.length - 1;
    if (index >= slides.length) index = 0;
    
    current = index;
    const offset = -current * slideWidth;
    console.log(offset);
    slidesContainer.style.transform = `translateX(${offset}%)`;
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