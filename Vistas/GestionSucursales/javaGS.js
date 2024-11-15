document.addEventListener('DOMContentLoaded', function() {
    ocultarAlerta('alert-mensaje', 1000);

    document.getElementById('BtnAsiganrEmpleado').addEventListener('click', function(event){
        event.preventDefault();
        let validado = validarAsignarEmpleadoModal();
        console.log(validado);
        if(validado){
            let FormAsignarEmpleado = document.getElementById('AsignarEmpleadoForm');
            FormAsignarEmpleado.submit();
        }
        document.getElementById('CencelarAsignacion').addEventListener('click', function(){
            location.reload();
        });
    });

    document.getElementById('btnGuardarEdicionSucursal').addEventListener('click', function(event){
        event.preventDefault();
        let valido = editarSucursalModal();
        console.log(valido);
        if(valido){
            Swal.fire({
                position: "top-end",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            }).then(() => {
                let editarSucursalForm=document.getElementById('editarSucursalForm');
                editarSucursalForm.submit();      
            });
        } 
    });
    document.getElementById('CancelarEdicionSucursal').addEventListener('click', function (){
        location.reload();
    });

    document.getElementById('AgregarUsuarioBTN').addEventListener('click', function(event){

        event.preventDefault();
        let validado = AgregarUsuarioModal();
        console.log(validado);
        if(validado){
            let AsignarRolUsuario = document.getElementById('AsignarRolUsuario');
            AsignarRolUsuario.submit();
        }
    
    })
    document.getElementById('CancelarAgregarUsuarioBTN').addEventListener('click', function(){
        location.reload();
    })



    let reasignarRolBtn = document.getElementById('ReasignarRolBTN');
    let cancelarReasignarRolBtn = document.getElementById('CancelarReasignarRolBTN');

    if (reasignarRolBtn) {
        reasignarRolBtn.addEventListener('click', function(event){
            event.preventDefault();
            let validado = ReasignarRolModal();
            console.log(validado);
            if(validado){
                let ReasignarRolForm = document.getElementById('ReasignarRolForm');
                ReasignarRolForm.submit();
            }
        });
    }

    if (cancelarReasignarRolBtn) {
        cancelarReasignarRolBtn.addEventListener('click', function(){
            location.reload();
        });
    }
});

//
function validarAsignarEmpleadoModal(){
    let bandera = true;
    // Validar campos y actualizamos bandera en caso de error
    if(!validarCampoVacio('Empleadonombre') || !validarCampoVacio('Empleadoclave')){
        bandera = false;
        console.log('nombre o clave:', bandera);
    }
    if(!validarCaracteres('Empleadonombre')){
        bandera = false;
        console.log('Empleadonombre:', bandera);
    }
    if(!validarCaracteres('Empleadoclave') || !UnaPalabra('Empleadoclave')){
        bandera = false;
        console.log('clave:', bandera);
    }
    return bandera;
}

function editarSucursalModal(){
    let bandera = true;

    if(!validarCampoVacio('nombreSucursal') || !validarCaracteres('nombreSucursal')){
        bandera = false;
        console.log('nombreSucursal:', bandera);
    }
    if(!validarCaracteres('provinciaSucursal') || !validarSoloLetras('provinciaSucursal')){
        bandera = false;
        console.log('provinciaSucursal:', bandera);
    }
    if(!validarCaracteres('codigoPostalSucursal') || !validarCodigoPostal('codigoPostalSucursal')){
        bandera = false;
        console.log('codigoPostalSucursal:', bandera);
    }
    if(!validarCaracteres('ubicacionSucursal') || !validarSoloLetras('ubicacionSucursal')){
        bandera = false;
        console.log('ubicacionSucursal:', bandera);
    }

    return bandera;
}

function AgregarUsuarioModal(){
    let bandera = true;

    if(!validarCampoVacio('NuevoRol')){
        bandera = false;
        console.log('NuevoRol:', bandera);
    }

    return bandera;
}

function ReasignarRolModal(){
    let bandera = true;

    if(!validarCampoVacio('NuevoRolUsuario')){
        bandera = false;
        console.log('NuevoRolUsuario:', bandera);
    }

    return bandera;

}


// validaciones
function validarCampoVacio(idCampo) {
    let inputValor = document.getElementById(idCampo).value.trim();
    let error = document.getElementById(idCampo);
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');

    if (inputValor === '') {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'Campo vacío';
        return false;
    }

    MensajeError.innerHTML = '';
    return true;
}

function validarCaracteres(idCampo) {
    let inputValor = document.getElementById(idCampo).value.trim();
    let error = document.getElementById(idCampo);
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');

    // Validar al menos 3 caracteres
    if (inputValor.length < 3) {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'Debe tener al menos 3 caracteres';
        return false;
    }

    MensajeError.innerHTML = '';
    return true;
}

function UnaPalabra(idcampo){
    let inputValor = document.getElementById(idcampo).value;
    let error = document.getElementById(idcampo);
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');
    // Validar que sea una sola palabra (sin espacios)
    let regex = /^\S+$/; 
    if (!regex.test(inputValor)) {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'La clave no puede contener espacios';
        return false;
    }

    MensajeError.innerHTML = '';
    return true;
}

function validarCodigoPostal(idCampo) {
    let inputValor = document.getElementById(idCampo).value.trim();
    let error = document.getElementById(idCampo);
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid'); 

    //  solo números entre 4 y 7 caracteres
    let regex = /^[0-9]{4,7}$/; 
    if (!regex.test(inputValor)) {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'El código postal debe ser un número entre 4 y 7 dígitos';
        return false;
    }

    MensajeError.innerHTML = '';  
    return true;
}

function validarSoloLetras(idCampo) {
    let inputValor = document.getElementById(idCampo).value.trim();
    let error = document.getElementById(idCampo);
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');

    // solo letras (mayúsculas y minúsculas)
    let regex = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;

    if (!regex.test(inputValor)) {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'Solo se permiten letras (sin números ni caracteres especiales)';
        return false;
    }
    MensajeError.innerHTML = ''; 
    return true;
}

function ocultarAlerta(id, tiempo) {
    const alerta = document.getElementById(id);
    if (alerta) {
        setTimeout(() => {
            alerta.classList.add('fade');
            alerta.style.opacity = 0;
            setTimeout(() => {
                alerta.style.display = 'none'; 
            }, 500);
        }, tiempo);
    }
}
