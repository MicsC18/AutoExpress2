
function inicio(){
    pestañas();
    AsignarEmpleado();
    EliminarUSuario();
    cargarValorSelect();
    agregarUsuario();
}


function AsignarEmpleado(){
    const botonesAsignar = document.querySelectorAll('.btnAsignarEmpleado');
    botonesAsignar.forEach((boton) => {
        boton.addEventListener('click', function(e) {
           
            const IdSucursal = e.target.getAttribute('data-id');
            document.getElementById('idSucursal').value = IdSucursal;
            console.log('ID del la sucursal:', IdSucursal); 
            
        });
    });
}

function EliminarUSuario(){
    const btnEliminarUsuario = document.querySelectorAll('.btnEliminarEmpleado');
    btnEliminarUsuario.forEach((boton) => {
        boton.addEventListener('click', function(e) {
           
            const IdUsuario = e.target.getAttribute('data-id');
            document.getElementById('id_EliminarUsuario').value = IdUsuario;
            console.log('ID del empleado:', IdUsuario); 
            
        });
    });

}

function pestañas() {
    const hash = window.location.hash;  

    if (hash) {
        const tabElement = document.querySelector(`a[href="${hash}"]`);  // Selecciona el enlace con el hash
        if (tabElement) {
            const tab = new bootstrap.Tab(tabElement);  // Crea una instancia de la pestaña
            tab.show();  // Muestra la pestaña correspondiente
        } else {
            console.warn(`No se encontró la pestaña para el hash: ${hash}`);
        }
    }
}

function cargarValorSelect(){
    const selectRol=document.getElementById('NuevoRol');
    selectRol.addEventListener('change', function(e){
        let valor=e.target.value;
        console.log('valos del rol:', valor);
        selectRol.value=valor;

    })
}

function agregarUsuario(){
    const selectRolUsuario = document.getElementById('NuevoRol');
    const nombreUsuario = document.getElementById('nombreUsuario');
    const claveUsuario = document.getElementById('claveUsuario');
    const sucursalAsignado = document.getElementById('divSucursalUsuario');

    // Inicializar campos como deshabilitados y ocultos al cargar la página
    nombreUsuario.disabled = true;
    claveUsuario.disabled = true;
    sucursalAsignado.classList.add('d-none');

    selectRolUsuario.addEventListener('change', function() {
        const rolSeleccionado = selectRolUsuario.value;

        if (!rolSeleccionado) {
            nombreUsuario.disabled = true;
            claveUsuario.disabled = true;
            sucursalAsignado.classList.add('d-none');
            return;
        }
        fetch('../../Controlador/GestionSucursales/VerificarRol.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ rol_id: rolSeleccionado })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();  // Cambiar de .json() a .text() para ver el contenido bruto
        })
        .then(data => {
            console.log(data);  // Ver la respuesta como texto crudo
            try {
                const jsonData = JSON.parse(data);  // Intentar parsear el texto como JSON
                if (jsonData.requiereSucursal) {
                    nombreUsuario.disabled = false;
                    claveUsuario.disabled = false;
                    sucursalAsignado.classList.remove('d-none');
                } else {
                    nombreUsuario.disabled = false;
                    claveUsuario.disabled = false;
                    sucursalAsignado.classList.add('d-none');
                }
            } catch (error) {
                console.error('Error al parsear la respuesta como JSON:', error);
            }
        })
        .catch(error => console.error('Error en fetch:', error));
    });
}

window.onload=inicio;