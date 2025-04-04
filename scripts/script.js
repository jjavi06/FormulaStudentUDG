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

