document.addEventListener('DOMContentLoaded', function(){

    //---------------------- Gestionar Marcas-------------------------------------------------------
        let btnAgregarMarca = document.getElementById('btnAgregarMarca');
        if (btnAgregarMarca) {
            btnAgregarMarca.addEventListener('click', function(event){
               event.preventDefault();
               let bandera=ValidarMarca('nombreMarca');
                if(bandera){
                    setTimeout(function() {
                        document.getElementById('FormAgregarMarca').submit();
                    }, 1000); 
                }
            });
        }
        
        document.getElementById('GuardarCambiosMarca').addEventListener('click', function(event){
            event.preventDefault();
            if(FormEditarMarca()){
                  setTimeout(function() {
                    document.getElementById('editarMarcaForm').submit(); 
                }, 1000); 
            }
        })

    //----------------------- Gestionar Modelos-------------------------------------------------------
        let btnAgregarModelo = document.getElementById('btnAgregarModelo');
        if (btnAgregarModelo ) {
            btnAgregarModelo.addEventListener('click', function(event) {
                event.preventDefault();
                let enviarForm = FormGestionarModelo();
                if (enviarForm) {
                    setTimeout(function() {
                        document.getElementById('agregarModeloForm').submit(); 
                    }, 500);
                }
            });
        }    
     
        // Editar Modelo
        document.getElementById('BtnEditarModelo').addEventListener('click', function(event) {
            event.preventDefault();

            FormEditarModelo();
            if (FormEditarModelo()) {
                setTimeout(function() {
                    document.getElementById('editarModeloForm').submit();
                    cerrarModal('ModeloEditar');
                }, 500); 
            }
        });
    
//-----------------------Gestionar Unidades-------------------------------------------------------
        let btnAgregarUnidad=document.getElementById('btnAgregarUnidad');
        if(btnAgregarUnidad){
            btnAgregarUnidad.addEventListener('click', function(event){
                event.preventDefault();
                let bandera=ValidarFormUnidad();
                console.log(bandera);
                if(bandera){
                    setTimeout(function() {
                       
                        document.getElementById('agregarUnidadForm').submit();
                           
                    }, 500);
                    limpiarInpts('agregarUnidadForm');
                }
            });
        }
    
        let btnGuardarMTM=document.getElementById('btnGuardarMTM');
        if(btnGuardarMTM){
            btnGuardarMTM.addEventListener('click', function(event){
                event.preventDefault();
                validarFormMTM();
                console.log(validarFormMTM());
                if(validarFormMTM()){
                    // Espera a que el DOM cargue el botón
                    setTimeout(function() {
                        let btnConfirmarGuardar = document.getElementById('btnGuardar');
                        
                        if (btnConfirmarGuardar) {
                            btnConfirmarGuardar.addEventListener('click', function() {
                                document.getElementById('FormUnidadMTM').submit();
                            });
                        } else {
                            console.error('El botón btnGuardar no se encontró en el DOM.');
                        }
                    }, 500);
                    limpiarInpts('FormUnidadMTM');
                }
            })
        }
    
        let btnEliminarUnidad=document.getElementById('btnEliminarUnidad');
        if(btnEliminarUnidad){
            btnEliminarUnidad.addEventListener('click', function(){
                setTimeout(function() {
                    // Busca el botón dentro del modal
                    let btnConfirmarGuardar = document.getElementById('btnGuardar');  
                    if (btnConfirmarGuardar) {
                        btnConfirmarGuardar.addEventListener('click', function() {
                            console.log('Unidad eliminada');
                            cerrarModal('modalGenerico');
                        });
                    } else {
                        console.error('El botón btnGuardar no se encontró en el DOM.');
                    }
                }, 500);  
            })
        }
    
        let BtnEditarUnidadForm=document.getElementById('BtnEditarUnidadForm');
        if(BtnEditarUnidadForm){
            BtnEditarUnidadForm.addEventListener('click', function (event){
                let flag=FormEditarUnidad();
                if(flag){
                    event.preventDefault();
                    setTimeout(function() {
                        document.getElementById('editarUnidadForm').submit(); 
                    }, 1000); 
                }
            })
        }
    })
        
//------------------  Forms --------------------------------------    
        
    function FormGestionarModelo(){
        let bandera=true;
        
            if(!validarCampoVacio('nombreModelo') || !validarNombre('nombreModelo')){
                bandera=false;
                console.log('modelo',bandera);
            }
            if(!validarCampoVacio('MarcaModelo') || !validarNombre('nombreModelo')){
                bandera=false;
                console.log('marca',bandera);
            }
            if(!validarCampoVacio('fabricacion') || !validarAño('fabricacion')){
                bandera=false;
                console.log('fabricacion', bandera);
            }
            if(!validarCampoVacio('tipoVehiculo')){
                bandera=false;
                console.log('tipoVehiculo', bandera);
            }

        console.log(bandera);
        return bandera;
    }
    
    function ValidarFormUnidad(){
        let bandera=true;
        
        if(!validarCampoVacio('color')){
            bandera=false;
        }
        if(!validarCampoVacio('puertas')){
            bandera=false;
        }
        if(!validarCampoVacio('aireAcondicionado')){
            bandera=false;
        }
        if(!validarCampoVacio('transmision')){
            bandera=false;
        }
        if(!validarCampoVacio('combustible')){
            bandera=false;
        }
        if(!validarCampoVacio('cantidadPersonas')){
            bandera=false;
        }
        if(!validarCampoVacio('cantidadMaletas')){
            bandera=false;
        }
        if(!validarCampoVacio('imagenUrl')){
            bandera=false;
        }
        if(!validarCampoVacio('disponibilidad')){
            bandera=false;
        }
        if(!validarCampoVacio('marcaUnidad')){
            bandera=false;
        }
        if(!validarCampoVacio('modeloUnidad') ){
            bandera=false;
        }
       /* if(!validarCampoVacio('fechaAlta')){
            bandera=false;
        }*/
        return bandera;
    }
    
    function validarFormMTM(){
        let bandera=true;
        
        if(!validarCampoVacio('unidad') ){
            bandera=false;
        }
        if(!validarCampoVacio('problemaUnidad')){
            bandera=false;
        }
        if(!validarCampoVacio('fechaBaja')){
            bandera=false;
        }
        if(!validarCampoVacio('InputfechaAlta') || !ValidarFechas()){
            bandera=false;
        }
    
        return bandera;
    }
    
    function FormEditarMarca(){
        let bandera=true;
    
        if(!validarCampoVacio('nombreMarcaNueva') || !ValidarMarca('nombreMarcaNueva')){
            bandera=false;
        }
        return bandera;
    }
    
    function FormEditarModelo(){
        let bandera=true;
    
        if(!validarCampoVacio('nombreModeloNuevo')){
            bandera=false;
            console.log('Modelo: ', bandera);
        }
    
        if(!validarCampoVacio('MarcaModelo')){
            bandera=false;
            console.log('marca: ', bandera);
        }
        if(!validarCampoVacio('FabricacionNuevo') || !validarAño('FabricacionNuevo')){
            bandera=false;
            console.log('Fabricacion: ', bandera);
        }
    
        if(!validarCampoVacio('tipoVehiculoNuevo')){
            bandera=false;
            console.log('tipoVehiculo: ', bandera);
        }

        console.log(bandera);
        return bandera;
    }
    
    function FormEditarUnidad(){
        let bandera=true;
    
        if(!validarCampoVacio('colorEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('puertasEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('aireAcondicionadoEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('transmisionEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('combustibleEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('cantidadPersonasEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('cantidadMaletasEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('imagenUrlEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('marcaUnidadEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('modeloUnidadEditar')){
            bandera=false;
        }
        if(!validarCampoVacio('disponibilidadEditar')){
            bandera=false;
        }
        return bandera;
    }
    
    
    //----------------------funciones validaciones-------------------------------
    function ValidarMarca(idcampo){
            let inputMarca= document.getElementById(idcampo).value.trim();
            let error=document.getElementById(idcampo);
            error.classList.remove('is-invalid');
        
            if(inputMarca ===''){
                error.classList.add('is-invalid');
                error.nextElementSibling.innerHTML='Campo vacío.';
                return false;
            }
        
            if(inputMarca.length <3){
                error.classList.add('is-invalid');
                error.nextElementSibling.innerHTML='La marca debe tener minimamente mas de 3 carácteres.';
                return false;
            }
        
             // Verificación de solo letras (sin números ni caracteres especiales)
             const soloLetrasRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
             if (!soloLetrasRegex.test(inputMarca)) {
                 error.classList.add('is-invalid');
                 error.nextElementSibling.innerHTML = 'Solo se permiten letras. No se permiten números ni caracteres especiales.';
                 return false;
             }
        
        return true;
    }
    function validarCampoVacio(idCampo) {
    
            let inputValor = document.getElementById(idCampo).value.trim();
            let error = document.getElementById(idCampo);
            let MensajeError = error.nextElementSibling;  
        
            error.classList.remove('is-invalid');
        
            if (inputValor === '') {
                error.classList.add('is-invalid');
                MensajeError.innerHTML = 'Campo vacío';
                error.nextElementSibling.innerHTML='campo vacío';
                return false;
            }
    
            MensajeError.innerHTML = '';  // Limpiar cualquier mensaje de error previo
            return true;
    }
    function validarNombre(idcampo){
            let NombreOMarca = document.getElementById(idcampo).value.trim();
            let error = document.getElementById(idcampo);
            let MensajeError = error.nextElementSibling; 
        
            if ( NombreOMarca.length < 4 ) {
                error.classList.add('is-invalid');
                MensajeError.innerHTML = 'Debe tener al menos 4 carácteres';
                return false;
            } else {
                error.classList.remove('is-invalid');
                MensajeError.innerHTML = '';
            }
        
            let regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Solo permite letras y espacios
            if (!regex.test(NombreOMarca)) {
                error.classList.add('is-invalid');
                MensajeError.innerHTML = 'Solo se permiten letras y espacios';
                return false;
            } else {
                error.classList.remove('is-invalid');
                MensajeError.innerHTML = '';
            }
        
            return true;
    }
    function validarAño(idcampo) {
        let FabricacionIngresado = document.getElementById(idcampo).value.trim();
        let error = document.getElementById(idcampo);
        let MensajeError = error.nextElementSibling; 
        let Actual = new Date().getFullYear();
    
        if (!/^\d{4}$/.test(FabricacionIngresado)) {
            error.classList.add('is-invalid');
            MensajeError.innerHTML = 'Debe ingresar un año válido de 4 dígitos';
            return false;
        }
    
        if (parseInt(FabricacionIngresado) > Actual) {
            error.classList.add('is-invalid');
            MensajeError.innerHTML = 'El año no puede ser mayor al año actual';
            return false;
        }
    
        if (parseInt(FabricacionIngresado) <= 0) {
            error.classList.add('is-invalid');
            MensajeError.innerHTML = 'El año debe ser un número positivo';
            return false;
        }
    
        error.classList.remove('is-invalid');
        MensajeError.innerHTML = '';
        
        return true;
    }
    
    function validarPalabras(idcampo){
        
        let variante = document.getElementById(idcampo).value.trim();
        let error = document.getElementById(idcampo);
        let MensajeError = error.nextElementSibling;
            
        let palabras = variante.split(/\s+/); // Divide por cualquier espacio en blanco
        let contadorPalabrasValidas = 0;
        
        // Validar que cada palabra tenga al menos 4 caracteres y no contenga números
        for (let palabra of palabras) {
            if (palabra.length >= 4 && /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/.test(palabra)) {
                contadorPalabrasValidas++;
            }
        }
        
        if (contadorPalabrasValidas < 2) {
            error.classList.add('is-invalid');
            MensajeError.innerHTML = 'Debe contener al menos 2 palabras con un mínimo de 4 caracteres cada una, sin números.';
            return false;
        }
        return true;
    }
 
    function ValidarFechas(){
          // Fecha de Baja debe ser anterior a Fecha de Alta
         let fechaBaja = document.getElementById('fechaBaja').value;
         let fechaAlta = document.getElementById('InputfechaAlta').value;
      
        if (fechaBaja && fechaAlta) {
            const dateBaja = new Date(fechaBaja);
            const dateAlta = new Date(fechaAlta);
      
              // Si la fecha de baja es mayor a la fecha de alta, mostrar error
            if (dateBaja > dateAlta) {
                document.querySelector('#fechaBaja + .invalid-feedback').textContent = 'La fecha de baja debe ser anterior a la fecha de alta.';
                document.getElementById('fechaBaja').classList.add('is-invalid');
                return false;
            } else {
                document.getElementById('fechaBaja').classList.remove('is-invalid');
                document.querySelector('#fechaBaja + .invalid-feedback').textContent = '';
            }
        }
    
        return true;
    }
    
    //_--------------- Funcion Modal---------------------
  
    function cerrarModal(idmodal){
        const modal = bootstrap.Modal.getInstance(document.getElementById(idmodal)); 
        modal.hide(); // Cierra el modal
    
    }
    function limpiarInpts(idform){
        document.getElementById(idform).addEventListener('hidden.bs.modal', function () {
        document.getElementById(idform).reset();
        });
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

    function MostrarModal(idmodal){
        const modal = new bootstrap.Modal(document.getElementById(idmodal));
        modal.show();
    }
