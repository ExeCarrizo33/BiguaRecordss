const form = document.querySelector("#form");
const nombreInput = document.querySelector(".nombre");
const contraseñaInput = document.querySelector(".contraseña");
const errorContraseña = document.querySelector("#contraseñaError");
const errorCaracter = document.querySelector("#nombreError");


form.addEventListener("input", function(){

    const nombre = nombreInput.value;
    const contraseña = contraseñaInput.value;
    const caracteres = /^[a-zA-Z0-9_-]+$/;

    if(nombre === ""){
        errorCaracter.textContent = "";
    }
    else if(!caracteres.test(nombre)){
        errorCaracter.textContent = "No puede haber caracteres especiales";
        return;
    }

    if (contraseña === "") {
        errorContraseña.textContent = "";
    } else if (contraseña.length > 8) {
        errorContraseña.textContent = "La contraseña no puede tener más de 8 caracteres";
    }

    
});