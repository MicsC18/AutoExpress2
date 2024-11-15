//Crear objeto Fecha
const fechaActual = new Date();

//Definir hora actual
const ahora = function () {
    let hora = fechaActual.getHours();
    let minutos = fechaActual.getMinutes();

    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minutos < 10) {
        minutos = "0" + minutos;
    }

    const horaActual = hora + ":" + minutos;

    return horaActual;
};

//Almacenar hora
let horaActual = ahora();

//Definir fecha de hoy
const fechaHoy = function () {
    let fecha = fechaActual.toLocaleDateString().split("/");
    let dia = parseInt(fecha[0]);
    let mes = parseInt(fecha[1]);
    let año = parseInt(fecha[2]);

    if(horaActual >= "23:30"){
        horaActual = "00:00";
        dia++;
    }

    if(mes == 1 || mes == 3 || mes == 5 || mes == 7 || mes == 8 || mes == 10 || mes == 12) {
        if(dia >= 32){
            dia -= 31;
            mes++;
        }
        if(mes >= 13){
            mes -= 12;
            año++;
        }
    } else if (mes == 2) {
        if(dia >= 29){
            dia -= 28;
            mes++;
        }
    } else {
        if(dia >= 31){
            dia -= 30;
            mes++;
        }
    }

    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }

    const hoy = año + "-" + mes + "-" + dia;

    return hoy;
};

//Almacenar fechaHoy
const hoy = fechaHoy();

//Definir fecha de mañana
const fechaMañana = function () {
    let fecha = fechaActual.toLocaleDateString().split("/");
    let dia = parseInt(fecha[0])+1;
    let mes = parseInt(fecha[1]);
    let año = parseInt(fecha[2]);

    if(mes == 1 || mes == 3 || mes == 5 || mes == 7 || mes == 8 || mes == 10 || mes == 12) {
        if(dia >= 32){
            dia -= 31;
            mes++;
        }
        if(mes >= 13){
            mes -= 12;
            año++;
        }
    } else if (mes == 2) {
        if(dia >= 29){
            dia -= 28;
            mes++;
        }
    } else {
        if(dia >= 31){
            dia -= 30;
            mes++;
        }
    }

    let dia2 = dia+1;

    if (dia < 10) {
        dia = "0" + dia;
    }
    if(dia2 < 10){
        dia2 = "0" + dia2;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }

    let mañana = año + "-" + mes + "-" + dia;

    if(hoy == mañana){
        mañana = año + "-" + mes + "-" + dia2;
    }

    return mañana;
};

//Almacenar fechaMañana
const mañana = fechaMañana();

//Retiro
const sucRetiro = document.getElementById("suc-retiro");
const fechaRetiro = document.getElementById("fecha-retiro");
const horaRetiro = document.getElementById("hora-retiro");
const horaRetiroOption = document.querySelectorAll("hora-retiro");
const errorSucRetiro = document.getElementById("errorSucRetiro");
const errorFechaRet = document.getElementById("errorFechaRet");
const errorHoraRet = document.getElementById("errorHoraRet");

//Devolucion
const sucDevolucion = document.getElementById("suc-devolucion");
const fechaDevolucion = document.getElementById("fecha-devolucion");
const horaDevolucion = document.getElementById("hora-devolucion");
const horaDevolucionOption = document.querySelectorAll("hora-devolucion");
const errorSucDevolucion = document.getElementById("errorSucDevolucion");
const errorFechaDev = document.getElementById("errorFechaDev");
const errorHoraDev = document.getElementById("errorHoraDev");

//Formulario
const mensaje = document.getElementById("mensaje");
const enviarFormulario = document.getElementById("formulario");

//Funciones
const limpiarMensajes = function () {
    errorSucRetiro.innerHTML = "";
    errorSucRetiro.classList.add("d-none");
    sucRetiro.classList.remove("is-invalid");
    errorSucDevolucion.innerHTML = "";
    errorSucDevolucion.classList.add("d-none");
    sucDevolucion.classList.remove("is-invalid");
    errorFechaRet.innerHTML = "";
    errorFechaRet.classList.add("d-none");
    fechaRetiro.classList.remove("is-invalid");
    errorFechaDev.innerHTML = "";
    errorFechaDev.classList.add("d-none");
    fechaDevolucion.classList.remove("is-invalid");
    errorHoraRet.innerHTML = "";
    errorHoraRet.classList.add("d-none");
    horaRetiro.classList.remove("is-invalid");
    errorHoraDev.innerHTML = "";
    errorHoraDev.classList.add("d-none");
    horaDevolucion.classList.remove("is-invalid");

    mensaje.innerHTML = "";
    mensaje.classList.remove("alert-danger");
    mensaje.classList.add("d-none");
};

const definirFechas = function () {
    //Fecha de Retiro
    fechaRetiro.setAttribute("min", hoy);
    fechaRetiro.value = hoy;

    //Fecha de Devolución
    fechaDevolucion.setAttribute("min", mañana);
    fechaDevolucion.value = mañana;
};

const definirHorarios = async function () {
    let url = "json/horarios.json";

    try {
        let response = await fetch(url);

        const datos = await response.json();

        datos.forEach(hora => {
            if (hora > horaActual) {
                let option1 = document.createElement("option");
                option1.value = hora;
                option1.innerHTML = hora;
                horaRetiro.appendChild(option1);
                let option2 = document.createElement("option");
                option2.value = hora;
                option2.innerHTML = hora;
                horaDevolucion.appendChild(option2);
            }


        });
    } catch (error) {
        errorHoraRet.innerHTML = "Se produjo un error al obtener las horas de retiro.";
        horaRetiro.classList.add("is-invalid");
        errorHoraDev.innerHTML = "Se produjo un error al obtener las horas de devolucion.";
        horaDevolucion.classList.add("is-invalid");
    }
};

const validarSucRetiro = function () {
    if (sucRetiro.value === "") {
        errorSucRetiro.innerHTML = "Debe ingresar la sucursal de retiro.";
        sucRetiro.classList.add("is-invalid");
        errorSucRetiro.classList.remove("d-none");
        return false;
    } else {
        return true;
    }
};

const validarSucDevolucion = function () {
    if (sucDevolucion.value === "") {
        errorSucDevolucion.innerHTML = "Debe ingresar la sucursal de devolucion.";
        sucDevolucion.classList.add("is-invalid");
        errorSucDevolucion.classList.remove("d-none");
        return false;
    } else {
        return true;
    }
};

const validarFechaRet = function () {

    if (fechaRetiro.getAttribute("type") != "date") {
        errorFechaRet.innerHTML = "La fecha ingresada es inválida.";
        fechaRetiro.classList.add("is-invalid");
        errorFechaRet.classList.remove("d-none");
        return false;
    } else {
        if (fechaRetiro.value === "") {
            errorFechaRet.innerHTML = "Debe ingresar la fecha de retiro.";
            fechaRetiro.classList.add("is-invalid");
            errorFechaRet.classList.remove("d-none");
            return false;
        } else if (fechaRetiro.value < hoy) {
            errorFechaRet.innerHTML = "La fecha de retiro no puede ser anterior al día de hoy.";
            fechaRetiro.classList.add("is-invalid");
            errorFechaRet.classList.remove("d-none");
            return false;
        } else {
            return true;
        }
    }

};

const validarFechaDev = function () {

    if (fechaDevolucion.getAttribute("type") != "date") {
        errorFechaDev.innerHTML = "La fecha ingresada es inválida.";
        fechaDevolucion.classList.add("is-invalid");
        errorFechaDev.classList.remove("d-none");
        return false;
    } else {

        if (fechaDevolucion.value === "") {
            errorFechaDev.innerHTML = "Debe ingresar la fecha de devolucion.";
            fechaDevolucion.classList.add("is-invalid");
            errorFechaDev.classList.remove("d-none");
            return false;
        }
        if (fechaRetiro.value >= fechaDevolucion.value) {
            errorFechaDev.innerHTML = "La fecha de devolucion debe ser, como mínimo, 24hs posterior a la fecha de Retiro.";
            fechaDevolucion.classList.add("is-invalid");
            errorFechaDev.classList.remove("d-none");
            return false;
        }

        if (fechaDevolucion.value < mañana) {
            errorFechaDev.innerHTML = "La fecha de devolucion debe ser, como mínimo, 24hs posterior a la fecha de Retiro.";
            fechaDevolucion.classList.add("is-invalid");
            errorFechaDev.classList.remove("d-none");
            return false;
        } else {
            return true;
        }
    }
};

const validarHoraRet = function () {

    let horaValida = /^([01]\d|2[0-3]):([0-5]\d)$/;

    if (horaRetiro.value === "") {
        errorHoraRet.innerHTML = "Debe elegir la hora de retiro.";
        horaRetiro.classList.add("is-invalid");
        errorHoraRet.classList.remove("d-none");
        return false;
    } else if (!horaValida.test(horaRetiro.value)) {
        errorHoraRet.innerHTML = "La hora de retiro ingresada es inválida.";
        horaRetiro.classList.add("is-invalid");
        errorHoraRet.classList.remove("d-none");
        return false;
    } else {
        return true;
    }
};

const validarHoraDev = function () {

    let horaValida = /^([01]\d|2[0-3]):([0-5]\d)$/;

    if (horaDevolucion.value === "") {
        errorHoraDev.innerHTML = "Debe elegir la hora de devolucion.";
        horaDevolucion.classList.add("is-invalid");
        errorHoraDev.classList.remove("d-none");
        return false;
    } else if (horaRetiro.value > horaDevolucion.value){
        errorHoraDev.innerHTML = "La hora de devolucion debe ser igual o posterior a 24hs desde la hora de Retiro";
        horaDevolucion.classList.add("is-invalid");
        errorHoraDev.classList.remove("d-none");
    } else if (!horaValida.test(horaDevolucion.value)) {
        errorHoraDev.innerHTML = "La hora de devolucion ingresada es inválida.";
        horaDevolucion.classList.add("is-invalid");
        errorHoraDev.classList.remove("d-none");
        return false;
    } else {
        return true;
    }
};

const cargarSucursales = async function () {
    let url = "cargarSucursales.php";

    limpiarMensajes();

    sucRetiro.innerHTML = '<option value="">Seleccione la sucursal</option>';
    sucDevolucion.innerHTML = '<option value="">Seleccione la sucursal</option>';

    try {
        let response = await fetch(url);

        const data = await response.json();

        if (data.length != 0) {
            data.forEach(sucursal => {
                let option1 = document.createElement('option');
                let option2 = document.createElement('option');
                option1.value = sucursal.id_sucursal;
                option1.innerHTML = sucursal.nombre + " - " + sucursal.provincia + " - " + sucursal.ubicacion;
                option2.value = sucursal.id_sucursal;
                option2.innerHTML = sucursal.nombre + " - " + sucursal.provincia + " - " + sucursal.ubicacion;
                sucRetiro.appendChild(option1);
                sucDevolucion.appendChild(option2);
            });
        }
    } catch (error) {
        errorSucRetiro.innerHTML = "Error al cargar las sucursales.";
        sucRetiro.classList.add("is-invalid");
        errorSucRetiro.classList.remove('d-none');
        errorSucDevolucion.innerHTML = "Error al cargar las sucursales.";
        sucDevolucion.classList.add("is-invalid");
        errorSucDevolucion.classList.remove('d-none');
    }
};

const manejoErrores = function (datos) {
    limpiarMensajes();

    if(datos.mensaje){
        mensaje.innerHTML = datos.mensaje;
        mensaje.classList.add("alert-danger");
        mensaje.classList.remove("d-none");
        setTimeout(function () {
            location.href ="../login/login.php";
        }, 1000);
    } else if(datos.sucretiro){
        errorSucRetiro.innerHTML = datos.suc-retiro;
        sucRetiro.classList.add("is-invalid");
        errorSucRetiro.classList.remove("d-none");
    } else if(datos.sucdevolucion) {
        errorSucDevolucion.innerHTML = datos.suc-devolucion;
        sucDevolucion.classList.add("is-invalid");
        errorSucDevolucion.classList.remove("d-none");
    } else if(datos.fecharetiro) {
        errorFechaRet.innerHTML = datos.fecharetiro;
        fechaRetiro.classList.add("is-invalid");
        errorFechaRet.classList.remove("d-none");
    } else if(datos.fechadevolucion) {
        errorFechaDev.innerHTML = datos.fechadevolucion;
        fechaDevolucion.classList.add("is-invalid");
        errorFechaDev.classList.remove("d-none");
    } else if(datos.horaretiro) {
        errorHoraRet.innerHTML = datos.horaretiro;
        horaRetiro.classList.add("is-invalid");
        errorHoraRet.classList.remove("d-none");
    } else if (datos.horadevolucion) {
        errorHoraDev.innerHTML = datos.horadevolucion;
        horaDevolucion.classList.add("is-invalid");
        errorHoraDev.classList.remove("d-none");
    } else{
        location.href ="../paginaBusqueda/buscar-vehiculos.php";
    }
};

const procesarReserva = async function (datosForm) {
    let url = "validarReserva.php";

    try {
        let response = await fetch(url, {
            method: 'POST',
            body: datosForm
        });

        const datos = await response.json();

        manejoErrores(datos);

    } catch (error) {
        mensaje.innerHTML = "Se produjo un error al procesar la reserva.";
        mensaje.classList.add("alert-danger");
        mensaje.classList.remove("d-none");
    }
};

enviarFormulario.addEventListener("submit", function (e) {
    e.preventDefault();

    limpiarMensajes();

    let sucRetiroOK = validarSucRetiro();
    let sucDevolucionOK = validarSucDevolucion();
    let fechaRetOK = validarFechaRet();
    let fechaDevOK = validarFechaDev();
    let horaRetOK = validarHoraRet();
    let horaDevOK = validarHoraDev();

    if (sucRetiroOK && sucDevolucionOK && fechaRetOK && fechaDevOK && horaRetOK && horaDevOK) {
        const datosForm = new FormData(this);
        procesarReserva(datosForm);
    }
});

addEventListener("DOMContentLoaded", definirFechas());
addEventListener("DOMContentLoaded", definirHorarios());
addEventListener("DOMContentLoaded", cargarSucursales());