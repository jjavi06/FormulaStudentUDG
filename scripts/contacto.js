// ============================ MOSTRAR INPUT ORGANIZACIÓN ==============================
const subject = document.getElementById("subject");
const organitzationInput = document.getElementById("organizacion");
const lblOrganitzation = document.getElementById("lblOrganizacion");
subject.addEventListener('change', function(){
    if(subject.value == "becomeSponsor"){
        organitzationInput.style.display = "block";
        lblOrganitzation.style.display = "block";
    }
    else{
        lblOrganitzation.style.display = "none";
        organitzationInput.style.display = "none";
    }
});

// ========================== VALIDACIÓN DEL FORMULARIO =====================================
const form = document.getElementById("contact-form");
const camposObligatorios = document.querySelectorAll("[required]");
const sendForm = document.getElementById("sendForm");
let lang;
let valido = true;
form.addEventListener('submit', function(e){
    e.preventDefault();
    lang = document.documentElement.getAttribute("lang");
    //En caso de no estar todos los campos completos, salta una alerta
    if(!ContenidoCampos()){
        // Consultar idioma del documento
        switch(lang){
            case "es":
                alert("Por favor, rellena todos los campos obligatorios.");
                MarcarCamposVacios();
                break;
            case "en":
                alert("Please fill in all required fields.");
                MarcarCamposVacios();
                break;
            case "ca":
                alert("Si us plau, omple tots els camps obligatoris.");
                MarcarCamposVacios();
                break;
        }
    }
    //En caso de que los campos no sigan la estructura válida, salta una alerta
    else{
        // Saltan alertas en función del campo inválido
        if(ValidarContenido() != ""){
            switch(lang){
                case "es":
                    switch(ValidarContenido()){
                        case "nombre":
                            alert("Por favor escribe un nombre válido.");
                            break;
                        case "correo":
                            alert("Por favor, escribe un correo válido");
                            break;
                        case "mensaje":
                            alert("El mensaje escrito es demasiado corto.");
                            break;
                    }
                    break;
                case "en":
                    switch(ValidarContenido()){
                        case "nombre":
                            alert("Plese write a valid name.");
                            break;
                        case "correo":
                            alert("Plese write a valid email.");
                            break;
                        case "mensaje":
                            alert("The message is too short.");
                            break;
                    }
                    break;
                case "ca":
                    switch(ValidarContenido()){
                        case "nombre":
                            alert("Si us plau, escriu un nom vàlid.");
                            break;
                        case "correo":
                            alert("Si us plau, escriu un correo vàlid.");
                            break;
                        case "mensaje":
                            alert("El missatge es massa curt.");
                            break;
                    }
                    break;
            }
        }
        // Si los campos son válidos, se envia el formulario.
        else if(ValidarContenido() == ""){
            form.submit();
        }
    }
});

// Comprueba que todos los campos obligatorios tengan contenido
function ContenidoCampos(){
    let cont = 0;
    while(valido && cont < camposObligatorios.length){
        if(camposObligatorios[cont].value == "")
            valido = false;
        cont++;
    }
    return valido;
}
// En caso de que hayan campos vacios, se marca su borde de color rojo.
function MarcarCamposVacios(){
    camposObligatorios.forEach(elem => {
        if(elem.value == ""){
            elem.style.border = "solid 1px red";
            elem.addEventListener('change', function(){
                if(elem.value != "")
                    elem.style.border = "solid 1px grey";
            });
        }
    });
}
// Valida el contenido por la estructura que debe seguir, devuelve el campo erroneo.
function ValidarContenido(){
    const name = document.getElementById("nombreContacto").value.trim();
    const email = document.getElementById("correoContacto").value.trim();
    const message = document.getElementById("mensajeContacto").value.trim();
    let campoFallido = "";
    // El nombre debe tener mas de 2 letras
    if (name.length < 3)
        campoFallido = "nombre";
    // El email tiene que ser válido
    if (!ValidarEmail(email))
        campoFallido = "correo";
    // El mensaje tiene que tener mas de 10 carácteres.
    if (message.length < 11)
        campoFallido = "mensaje";
    return campoFallido;
}
// Función para validar el correo
function ValidarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]/;
    return re.test(email);
}
