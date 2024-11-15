const formRecup = document.getElementById('form-recup');
const emailRecup = document.getElementById('email-recup');
const errorEmail = document.querySelector('.errorEmail');
let emailBien = false;

const validarEmail = function () {
    const regex = /^\w+([.-_]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (regex.test(emailRecup.value)) {
        errorEmail.classList.add('d-none');
        emailBien = true;
    } else {
        errorEmail.textContent = "El email ingresado es incorrecto.";
        errorEmail.classList.remove('d-none');
        emailBien = false;
    }
    return emailBien;
};

const procesarRecup = async function () {
    
};

formRecup.addEventListener('submit',function (e) { 
    e.preventDefault();

    let correo = validarEmail();

    if(correo){
        procesarRecup();
    }
});