const formulario = document.getElementById("formulario");
const alertDiv = document.getElementById("alert");
const username = document.getElementById("username");
const errorUsername = document.querySelector(".username-mal");
const nombre = document.getElementById("nombre");
const errorNombre = document.querySelector(".errorNombre");
const clave = document.getElementById("password");
const errorClave = document.querySelector(".clave-mal");
const correo = document.getElementById("email");
const errorCorreo = document.querySelector(".email-mal");

let usernameBien = false;
let nombreBien = false;
let claveBien = false;
let emailBien = false;
let registroBien = false;

const limpiarMensajes = function () {
    errorUsername.innerHTML = "";
    errorUsername.classList.add('d-none');
    errorNombre.innerHTML = "";
    errorNombre.classList.add('d-none');
    errorCorreo.innerHTML = "";
    errorCorreo.classList.add('d-none');
    errorClave.innerHTML = "";
    errorClave.classList.add('d-none');
    alertDiv.innerHTML = "";
    alertDiv.classList.add('d-none');

    usernameBien = false;
    nombreBien = false;
    claveBien = false;
    emailBien = false;
}

const validarUsername = function () {
    const regex = /^(?![._])([a-zA-ZÁÉÍÓÚáéíóúñÑäÄëËïÏöÖüÜçÇ0-9]+[._]?[a-zA-ZÁÉÍÓÚáéíóúñÑäÄëËïÏöÖüÜçÇ0-9]*)$/;

    if (regex.test(username.value)) {
        usernameBien = true;
    } else {
        if(username.value.at(0) == '.' || username.value.at(0) == '_'){
            errorUsername.innerHTML = "No debe comenzar con puntos ni guiones bajos.";
        } else{
            errorUsername.innerHTML = "Debe contener entre 6-30 caracteres alfanuméricos y/o un punto o un guion bajo.";
        }
        errorUsername.classList.remove('d-none');
        username.focus();
        usernameBien = false;
    }

    return usernameBien;
}

const validarNombre = function () {
    const regex = /^[a-zA-ZÁÉÍÓÚáéíóúñÑäÄëËïÏöÖüÜçÇ]{3,30}(?: [a-zA-ZÁÉÍÓÚáéíóúñÑäÄëËïÏöÖüÜçÇ]{3,30})+$/;

    if (nombre.value.trim().length == 0) {
        errorNombre.innerHTML = "Debe ingresar el nombre.";
        errorNombre.classList.remove('d-none');
        nombre.focus();
        nombreBien = false;
    } else if (!regex.test(nombre.value)) {
        errorNombre.innerHTML = "El nombre debe contener dos palabras de 3 letras cada una como minimo.";
        errorNombre.classList.remove('d-none');
        nombre.focus();
        nombreBien = false;
    } else {
        nombreBien = true;
    }

    return nombreBien;
}

const validarCorreo = function () {
    var regexEmail = /^\w+([.-_]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (regexEmail.test(correo.value)) {
        emailBien = true;
    } else {
        errorCorreo.innerHTML = "El correo ingresado es inválido.";
        errorCorreo.classList.remove('d-none');
        correo.focus();
        emailBien = false;
    }

    return emailBien;
}

const validarClave = function () {
    const regex = /^(?=.*[°|!"#$%&/()=?'¡¿´¨*+{\[}\]\-\_:.,;><]).{8,}$/;

    if (regex.test(clave.value)) {
        claveBien = true;
    } else {
        errorClave.innerHTML = "Debe contener 8 caracteres como mínimo y un símbolo.";
        errorClave.classList.remove('d-none');
        clave.focus();
        claveBien = false;
    }

    return claveBien;
}

const procesarRegistro = async function () {
    let url = "procesarRegistro.php";
    alertDiv.innerHTML = "";
    alertDiv.classList.add('d-none');
    registroBien = false;
    
    try {
        let response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                username: username.value,
                nombre: nombre.value,
                email: correo.value,
                password: clave.value
            })
        });

        const datos = await response.text();

        if (datos === 'success') {
            alertDiv.innerHTML = "Se ha registrado exitosamente, iniciando sesion...";
            alertDiv.classList.remove('alert-danger');
            alertDiv.classList.add('alert-success');
            alertDiv.classList.remove('d-none');
            setInterval(formulario.submit(), 3000);
        } else if (datos === 'usuarioError') {
            alertDiv.innerHTML = "El nombre de usuario no está disponible.";
            alertDiv.classList.remove('d-none');
        } else if (datos === 'emailError') {
            alertDiv.innerHTML = "El email ya se encuentra registrado.";
            alertDiv.classList.remove('d-none');
        } else if (datos === 'camposVacios') {
            alertDiv.innerHTML = "Debe completar todos los campos.";
            alertDiv.classList.remove('d-none');
        }

    } catch (error) {
        alertDiv.innerHTML = "Se ha producido un error en el servidor.";
        alertDiv.classList.remove('d-none');
    }
}

formulario.addEventListener('submit', function (e) {
    e.preventDefault();

    limpiarMensajes();

    let usuario = validarUsername();
    let nombres = validarNombre();
    let email = validarCorreo();
    let pass = validarClave();

    if(usuario && nombres && email && pass){
        procesarRegistro();
    }
});