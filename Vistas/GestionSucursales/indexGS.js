
function inicio(){
    pestañas();
    AsignarEmpleado();
    EliminarUSuario();
    cargarValorSelect();
    agregarUsuario();
}


async function AsignarEmpleado() {
    const botonesAsignar = document.querySelectorAll('.btnAsignarEmpleado');
    botonesAsignar.forEach((boton) => {
        boton.addEventListener('click', async function (e) {
            const IdUsuarioGS = e.target.getAttribute('data-id');  // Obtener el ID del usuario
            const NombreUsuarioSeleccionado = e.target.getAttribute('data-nombre');  // Obtener el nombre del usuario
            
         
            document.getElementById('IdUsuarioGS').value = IdUsuarioGS;
            document.getElementById('NombreUsuarioSeleccionado').value = NombreUsuarioSeleccionado;

            console.log('ID usuario y nmbre:',IdUsuarioGS, NombreUsuarioSeleccionado); 

         
            const rolSelect = document.getElementById('NuevoRolUsuario');
            const selectSucursalContainer = document.getElementById('selectSucursalContainer');
            const sucursalSelect = document.getElementById('sucursalAsignadaUsuario');

            
            selectSucursalContainer.style.display = "none";

            
            rolSelect.addEventListener('change', async function () {
                if (rolSelect.value == '4') {  // Si el valor seleccionado es 4
                  
                    selectSucursalContainer.style.display = "block";


                    await cargarSucursales(sucursalSelect);
                } else {
                 
                    selectSucursalContainer.style.display = "none";
                }
            });
        });
    });
}

async function cargarSucursales(selectElement) {
    try {
        const response = await fetch('./../../Controlador/GestionSucursales/obtenerSucursales.php');
        const sucursales = await response.json();  

        if (selectElement) {
          
            selectElement.innerHTML = '<option value="">Seleccione una sucursal</option>';

            sucursales.forEach(sucursal => {
                const option = document.createElement('option');
                option.value = sucursal.id_sucursal;
                option.textContent = sucursal.nombre;
                selectElement.appendChild(option);
            });
        } else {
            console.error('El elemento select no existe.');
        }
    } catch (error) {
        console.error('Error al cargar las sucursales:', error);
    }
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
