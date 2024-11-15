const formulario = document.getElementById('formulario');
const btnEnviar = document.querySelector(".iniciar-sesion");
const email = document.getElementById("email");
const errorEmail = document.querySelector(".email-mal");
const clave = document.getElementById("password");
const errorClave = document.querySelector(".clave-mal");
const alertDiv = document.getElementById('alert');
let emailBien = false;
let claveBien = false;
let loginBien = false;

const validarEmail = function () {
    const regex = /^\w+([.-_]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    if (regex.test(email.value)) {
        errorEmail.classList.add('d-none');
        emailBien = true;
    } else {
        errorEmail.textContent = "El email ingresado es incorrecto.";
        errorEmail.classList.remove('d-none');
        emailBien = false;
    }
    return emailBien;
};

const validarClave = function () {
    const regex = /^(?=.*[°|!"#$%&/()=?'¡¿´¨*+{\[}\]\-\_:.,;><]).{8,}$/;
    if (regex.test(clave.value)) {
        errorClave.classList.add('d-none');
        claveBien = true;
    } else {
        errorClave.textContent = "La contraseña debe contener como mínimo 8 caracteres y un símbolo.";
        errorClave.classList.remove('d-none');
        claveBien = false;
    }
    return claveBien;
};

const limpiarMensajes = function () {
    errorEmail.classList.add('d-none');
    errorEmail.textContent = "";
    errorClave.classList.add('d-none');
    errorClave.textContent = "";
    alertDiv.classList.add('d-none');
    alertDiv.innerHTML = "";
    loginBien = false;
}

const procesarLogin = async function() {
    let url = "processLogin.php";
    alertDiv.innerHTML = "";
    alertDiv.classList.add('d-none');
    loginBien = false;
    
    try {
        let response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                email: email.value,
                password: clave.value
            })
        });

        const datos = await response.text();

        if (datos === '') {
            formulario.submit();
        } else if (datos === 'incorrecto') {
            alertDiv.innerHTML = "El email o la contraseña son incorrectos.";
            alertDiv.classList.remove('d-none');
        } else if (datos === 'vacio') {
            alertDiv.innerHTML = "Debe completar todos los campos.";
            alertDiv.classList.remove('d-none');
        }

    } catch (error) {
        alertDiv.innerHTML = "Se ha producido un error, intente nuevamente.";
        alertDiv.classList.remove('d-none');
    }
}

formulario.addEventListener('submit', function (e) {
    e.preventDefault();

    limpiarMensajes();

    let mail = validarEmail();
    let clave = validarClave();

    if(mail && clave){
        procesarLogin();
    }
});
