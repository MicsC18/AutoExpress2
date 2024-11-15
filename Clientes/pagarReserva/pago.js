const fechaActual = new Date();

// Estilo para todos los Label
const label = document.querySelectorAll("label");
label.forEach(element => {
    element.classList.add('mt-3', 'mb-2');
});

// Datos Personales 
const nombre = document.getElementById("nombre");
const correo = document.getElementById("correo");
const codPais = document.getElementById("cod-pais");
const celular = document.getElementById("celular");
const documento = document.getElementById("documento");
const optionDocumento = document.querySelectorAll(".option-documento");
const numDocumento = document.getElementById("num-doc");
const formulario = document.getElementById("formulario");

// Variable para manejar qué documento se debe validar
var selectDoc = 0;

const selectSeguro = document.getElementById("seguro");
const optionSeguro = document.querySelectorAll(".option-seguro");
const seguroDescripcion = document.querySelector(".seguro-desc");

const errorNombre = document.querySelector(".errorNombre");
const errorCorreo = document.querySelector(".errorCorreo");
const errorCodPais = document.querySelector(".errorCodPais");
const errorCelular = document.querySelector(".errorCelular");
const errorDocumento = document.querySelector(".errorDocumento");

// Método de Pago
const titular = document.getElementById("tit-tarjeta");
const dniTitular = document.getElementById("dni-titular");
const numTarjeta = document.getElementById("num-tarjeta");
const vencimiento = document.getElementById("vencimiento");
const codSeguridad = document.getElementById("cod-seguridad");
const medioPago = document.getElementById("medio-pago");
const medioPagoTexto = document.getElementById("pago-texto");
const optionPago = document.querySelectorAll(".option-pago");
const datosTarjeta = document.querySelectorAll("#tarjeta");
const inputTarjeta = document.querySelectorAll("#tarjeta input");

// Variable para manejar el de medio de pago
var selectPago = 0;

const errorTitular = document.querySelector(".errorTitular");
const errorDNITitular = document.querySelector(".errorDNITitular");
const errorNumTarjeta = document.querySelector(".errorNumTarjeta");
const errorVencimiento = document.querySelector(".errorVencimiento");
const errorCodSeguridad = document.querySelector(".errorCodSeguridad");


// Validación Select Seguros
const seguroElegido = function () {
    optionSeguro.forEach(e => {
        if (e.selected) {
            if (e.value === 'seguro-basico') {
                seguroDescripcion.textContent = 'Cobertura básica que ampara al vehículo. En caso de daños a la carrocería del vehículo, accidente, robo, hurto, vuelco, incendio, y/o destrucción total, será a cargo del cliente el pago de la franquicia.';
            } else if (e.value === 'seguro-premium') {
                seguroDescripcion.textContent = 'Es una protección adicional que se puede contratar para viajar más seguro y tranquilo. En el caso de sufrir un siniestro deberá abonar una franquicia mínima según el tipo de vehículo alquilado.';
            }
            else {
                seguroDescripcion.textContent = '';
            }
        }
    });
};

selectSeguro.addEventListener('change', function () {
    seguroElegido();
});


// Validaciones Datos Personales
const validarNombre = function () {
    errorNombre.innerHTML = "";

    if (nombre.value.trim().length == 0) {
        errorNombre.innerHTML = "Debe ingresar el nombre.";
        nombre.value = "";
        nombre.focus();
        return false;
    }
    else if (nombre.value.split(" ").length < 2) {
        errorNombre.innerHTML = "El nombre debe contener dos palabras como minimo.";
        nombre.value = "";
        nombre.focus();
        return false;
    } else {
        return true;
    }
};

const validarCorreo = function () {
    errorCorreo.innerHTML = "";
    var correoValido = /^\w+([.-_]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (!correoValido.test(correo.value)) {
        errorCorreo.innerHTML = "El correo ingresado es inválido.";
        correo.value = "";
        correo.focus();
        return false;
    } else {
        return true;
    }
};

const validarCodPais = function () {
    errorCodPais.innerHTML = "";
    var codPaisValido = /^([+])(\d{1,1})([-]?)\d{1,3}$/;

    if (!codPaisValido.test(codPais.value)) {
        errorCodPais.innerHTML = "El código de pais ingresado es inválido";
        codPais.value = "";
        codPais.focus();
        return false;
    } else {
        return true;
    }
};

const validarCelular = function () {
    errorCelular.innerHTML = "";
    var celularValido = /^(\d{1,4})([-])(\d{1,11})$/;

    if (!celularValido.test(celular.value)) {
        errorCelular.innerHTML = "El celular ingresado es inválido.";
        celular.value = "";
        celular.focus();
        return false;
    } else {
        return true;
    }
};

const validarDNI = function () {
    errorDocumento.innerHTML = "";
    var dniValido = /^(\d{6,9})$/;

    if (!dniValido.test(numDocumento.value)) {
        errorDocumento.innerHTML = "El número de DNI es inválido.";
        numDocumento.value = "";
        numDocumento.focus();
        return false;
    } else {
        return true;
    }
};

const validarPasaporte = function () {
    errorDocumento.innerHTML = "";
    var pasaporteValido = /^[A-Z]{3,3}[0-9]{6,6}$/;

    if (!pasaporteValido.test(numDocumento.value)) {
        errorDocumento.innerHTML = "El pasaporte ingresado es inválido.";
        numDocumento.value = "";
        numDocumento.focus();
        return false;
    } else {
        return true;
    }
};

const validarDocumento = function () {
    errorDocumento.innerHTML = "";
    if (documento.value == "dni") {
        numDocumento.setAttribute("placeholder", "12345678");
        selectDoc = 1;
    }
    else if (documento.value == "pasaporte") {
        numDocumento.setAttribute("placeholder", "ABC123456");
        selectDoc = 2;
    }
    else {
        numDocumento.setAttribute("placeholder", "Seleccionar un documento")
    }
};


// Validaciones Método de Pago
const validarTitular = function () {
    errorTitular.innerHTML = "";

    if (titular.value.trim().length == 0) {
        errorTitular.innerHTML = "Debe ingresar el nombre.";
        titular.value = "";
        titular.focus();
        return false;
    }
    else if (titular.value.split(" ").length < 2) {
        errorTitular.innerHTML = "El nombre debe contener dos palabras como minimo.";
        titular.value = "";
        titular.focus();
        return false;
    } else {
        return true;
    }
};

const validarDNITitular = function () {
    errorDNITitular.innerHTML = "";
    var dniValido = /^(\d{6,9})$/;

    if (!dniValido.test(dniTitular.value)) {
        errorDNITitular.innerHTML = "El número de DNI es inválido.";
        dniTitular.value = "";
        dniTitular.focus();
        return false;
    } else {
        return true;
    }
};

const validarNumTarjeta = function () {
    errorNumTarjeta.innerHTML = "";
    var numTarjetaValido = /^(\d{16,16})$/;

    if (!numTarjetaValido.test(numTarjeta.value)) {
        errorNumTarjeta.innerHTML = "El número de tarjeta es inválido.";
        numTarjeta.value = "";
        numTarjeta.focus();
        return false;
    } else {
        return true;
    }
};

const validarVencimiento = function () {
    errorVencimiento.innerHTML = "";

    const mesActual = fechaActual.getMonth() + 1;
    const añoActual = fechaActual.getFullYear();
    const añoLimite = 2034;
    const mesInput = parseInt(vencimiento.value.split("/")[0]);
    const añoInput = parseInt(vencimiento.value.split("/")[1]);

    var vencValido = /^(\d{2,2})([/])(\d{4,4})$/;

    if (!vencValido.test(vencimiento.value)) {
        errorVencimiento.innerHTML = "La fecha de vencimiento ingresada es inválida.";
        vencimiento.value = "";
        vencimiento.focus();
        return false;
    } else if (añoInput < añoActual) {
        errorVencimiento.innerHTML = "El año de vencimiento no puede ser menor al año actual.";
        vencimiento.value = "";
        vencimiento.focus();
        return false;
    } else if (añoActual == añoInput) {
        if (mesInput < mesActual + 1) {
            errorVencimiento.innerHTML = "El mes de vencimiento debe ser igual o mayor al mes siguiente del actual.";
            vencimiento.value = "";
            vencimiento.focus();
            return false;
        }
    } else if (añoInput > añoLimite) {
        errorVencimiento.innerHTML = "El año de vencimiento ingresado es inválido.";
        vencimiento.value = "";
        vencimiento.focus();
        return false;
    } else {
        return true;
    }
};

const validarCodSeguridad = function () {
    errorCodSeguridad.innerHTML = "";
    var codSeguridadValido = /^(\d{3,3})$/;

    if (!codSeguridadValido.test(codSeguridad.value)) {
        errorCodSeguridad.innerHTML = "El código de seguridad ingresado es inválido";
        codSeguridad.value = "";
        codSeguridad.focus();
        return false;
    } else {
        return true;
    }
};

const validarMedioPago = function () {
    medioPagoTexto.innerHTML = "";

    inputTarjeta.forEach(e => {
        e.setAttribute("disabled", true);
    });

    datosTarjeta.forEach(e => {
        e.classList.add("d-none");
    });

    if (medioPago.value == "efectivo") {
        medioPagoTexto.innerHTML = "El pago será en efectivo en la sucursal elegida a la hora de retirar el vehículo.";
        selectPago = 0;
    }
    else if (medioPago.value == "transferencia") {
        medioPagoTexto.innerHTML = "Los datos bancarios para realizar la transferencia serán enviados a su correo electrónico. Luego, una vez confirmado el pago, se procesará su reserva y recibirá una confirmación en su correo.";
        selectPago = 0;
    }
    else if (medioPago.value == "tarjeta") {
        inputTarjeta.forEach(e => {
            e.removeAttribute("disabled");
        });
        datosTarjeta.forEach(e => {
            e.classList.remove("d-none");
        });
        selectPago = 1;
    }
};

medioPago.addEventListener("change", validarMedioPago);

documento.addEventListener("change", validarDocumento);

const confirmarReserva = async function () {
    let url = "confirmarReserva.php";

    try {
        let response = await fetch(url);

        const datos = await response.text();

        console.log(datos);

        // if(datos === "success"){
        //     console.log("reserva cargada");
        // } else {
        //     console.log("error");
        // }
    } catch (error) {
        console.log(error);
    }

}

formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    let dniOK;
    let titularOK;
    let dniTitularOK;
    let numTarjetaOK;
    let vencimientoOK;
    let codSeguridadOK;

    let nombreOK = validarNombre();
    let correoOK = validarCorreo();
    let codPaisOK = validarCodPais();
    let celularOK = validarCelular();

    if (selectDoc == 1) {
        dniOK = validarDNI();
    }
    else if (selectDoc == 2) {
        dniOK = validarPasaporte();
    }

    if (selectPago == 1) {
        titularOK = validarTitular();
        dniTitularOK = validarDNITitular();
        numTarjetaOK = validarNumTarjeta();
        vencimientoOK = validarVencimiento();
        codSeguridadOK = validarCodSeguridad();
    }

    if (nombreOK && correoOK && codPaisOK && celularOK && dniOK && titularOK && dniTitularOK && numTarjetaOK && vencimientoOK && codSeguridadOK){
        confirmarReserva();
    }
});

addEventListener("DOMContentLoaded", validarMedioPago);