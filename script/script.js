const form = document.querySelector("#form");
const nombreInput = document.querySelector(".nombre");
const apellidoInput = document.querySelector(".apellido");
const contraseñaInput = document.querySelector(".contraseña");
const errorContraseña = document.querySelector("#contraseñaError");
const errorCaracter = document.querySelector("#nombreError");
const errorCaracter2 = document.querySelector("#nombreError2");


function validarNombre(){

    const caracteres = /^[a-zA-Z0-9_-]+$/;
    const nombre = nombreInput.value;
    const borde = document.querySelector(".nombre");


    if(nombre === ""){
        errorCaracter.textContent = "";
        borde.style.borderBottom = "";
    }
    else if(!caracteres.test(nombre)){
        errorCaracter.textContent = "No puede haber caracteres especiales";
        borde.style.borderBottom = "2px solid red";
        return;
    }
    else{
        errorCaracter.textContent = "";

    }
    
}

function validarApellido(){

    const caracteres = /^[a-zA-Z0-9_-]+$/;
    const apellido = apellidoInput.value;
    const borde = document.querySelector(".apellido");

    if(apellido === ""){
        errorCaracter2.textContent = "";
        borde.style.borderBottom = "";
    }
    else if(!caracteres.test(apellido)){
        errorCaracter2.textContent = "No puede haber caracteres especiales";
        borde.style.borderBottom = "2px solid red";
        return;
    }
    else{
        errorCaracter2.textContent = "";

    }
    
}

function validarContraseña(){

    const contraseña = contraseñaInput.value;

    if (contraseña === "") {
        errorContraseña.textContent = "";
    } 
    else if (contraseña.length < 8) {
        errorContraseña.textContent = "La contraseña no puede tener menos de 8 caracteres";
    }
    
    

}

nombreInput.addEventListener("blur", function() {
    validarNombre();
})

apellidoInput.addEventListener("blur", function() {
    validarApellido();
})

form.addEventListener("input", function(event){
    const nombre = nombreInput.value;
    const apellido = apellidoInput.value;
    const contraseña = contraseñaInput.value;


    if(!validarNombre()){
        event.preventDefault();
    }
    else if(nombre === ""){
        errorCaracter.textContent = "";
    }

    if(!validarApellido()){
        event.preventDefault();
    }
    else if(apellido === ""){
        errorCaracter2.textContent = "";
    }
    

    if(!validarContraseña()){
        event.preventDefault();
    }
    else if(contraseña === ""){
        errorContraseña.textContent = "";
   }
})