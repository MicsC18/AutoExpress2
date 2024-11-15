window.onload = function() {

    pestañas();
    
    const botonesEditar = document.querySelectorAll('.btnEditarModelo');
    botonesEditar.forEach((boton) => {
        boton.addEventListener('click', function(e) {
           
            const idModelo = e.target.getAttribute('data-id');
            document.getElementById('id_modelo').value = idModelo;
            console.log('ID del modelo a editar:', idModelo); 
            
        });
    });

    const botonEliminarUnidad=document.querySelectorAll('.EliminarUnidadBTN');
    botonEliminarUnidad.forEach(boton => {
        boton.addEventListener('click', function(e){
            let idUnidad=e.target.getAttribute('data-id');
            document.getElementById('idUnidad').value=idUnidad;
            console.log('ID del modelo a eliminar:', idUnidad);
        })
        
    });

    EliminarModalModelo();
    marca();

    CargarSelectModelo('marcaUnidadEditar','modeloUnidadEditar');

};
    
function EliminarModalModelo(){
    let botonEliminar=document.querySelectorAll('.EliminarModeloBtn');
    botonEliminar.forEach(button => {
        button.addEventListener('click', function(e){
            let id_modelo=e.target.getAttribute('data-id');
            document.getElementById('id_modeloEliminar').value=id_modelo;
            console.log('ID del modelo a eliminar:', id_modelo);
        })
        
    });
}


function marca() {
    const selectModelo = document.getElementById('modeloUnidad');
    const selectMarca = document.getElementById('marcaUnidad');
    
    // Verificar si los elementos existen antes de manipularlos
    if (!selectModelo || !selectMarca) {
        console.log("Elementos modeloUnidad o marcaUnidad no encontrados en el DOM");
        return;
    }

    selectModelo.classList.add('disable');

    selectMarca.addEventListener('change', async function(e) {
        const nuevoValor = e.target.value;
        console.log('ID de la marca seleccionada:', nuevoValor);

        if (nuevoValor !== '') {
            selectModelo.disabled = false;
        } else {
            selectModelo.disabled = true;
            return;
        }

        let url = '../../Controlador/GestionVehiculos/CargarSelectModelos.php';
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `idMarcaUnidad=${encodeURIComponent(nuevoValor)}`
        });

        if (response.ok) {
            const data = await response.json();
            console.log('Respuesta del servidor:', data);
            procesarInformacion(data);
        } else {
            console.error('Error en la solicitud:', response.statusText);
        }
    });
}


const procesarInformacion = function(data) {
    const selectModelo = document.getElementById('modeloUnidad');
    selectModelo.innerHTML = ""; 

    if (data.length === 0) {
        console.log('No se encontraron modelos para la marca seleccionada.');
        const option = document.createElement('option');
        option.textContent = "No hay modelos disponibles";
        option.value = "";
        selectModelo.appendChild(option);
    } else {
        console.log('Modelos recibidos:', data);
        data.forEach((modelo) => {
            const option = document.createElement('option');
            option.value = modelo.id_modelo;
            option.textContent = modelo.modelo;
            selectModelo.appendChild(option);
        });
    }
};

const procesarInformacionUnidad = function(data,idSelectModeloUnidad ) {
    const selectModelo = document.getElementById(idSelectModeloUnidad);
    selectModelo.innerHTML = ""; 

    if (data.length === 0) {
        console.log('No se encontraron modelos para la marca seleccionada.');
        const option = document.createElement('option');
        option.textContent = "No hay modelos disponibles";
        option.value = "";
        selectModelo.appendChild(option);
    } else {
        console.log('Modelos recibidos:', data);
        data.forEach((modelo) => {
            const option = document.createElement('option');
            option.value = modelo.id_modelo;
            option.textContent = modelo.modelo;
            selectModelo.appendChild(option);
        });
    }
};

function CargarSelectModelo(idselectMarca, idSelectModeloUnidad){
    let selectMarcaUnidad = document.getElementById(idselectMarca);
    let selectModeloUnidad = document.getElementById(idSelectModeloUnidad);
  

    
    // Verificar si los elementos existen antes de manipularlos
    if (!selectMarcaUnidad || !selectModeloUnidad) {
        console.log("Elementos (Selects) no encontrados en el DOM");
        return;
    }

    selectModeloUnidad.classList.add('disable');

    selectMarcaUnidad.addEventListener('change', async function(e) {
        const IdValorMarca = e.target.value;
        console.log('ID de la marca seleccionada:', nuevoValor);

        if (IdValorMarca !== '') {
            selectModeloUnidad.disabled = false;
        } else {
            selectModeloUnidad.disabled = true;
            return;
        }

        let url = '../../Controlador/GestionVehiculos/CargarSelectModelos.php';
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `modeloUnidadEditar=${encodeURIComponent(IdValorMarca)}`
        });

        if (response.ok) {
            const data = await response.json();
            console.log('Respuesta del servidor:', data);
            procesarInformacionUnidad(data, 'modeloUnidadEditar');
        } else {
            console.error('Error en la solicitud:', response.statusText);
        }
    });





}

function pestañas(){
    const hash = window.location.hash; // Esto toma la parte después de '#' en el URL

    if (hash) {
        const tabElement = document.querySelector(`button[data-bs-target="${hash}"]`);
        
        if (tabElement) {
            const tab = new bootstrap.Tab(tabElement);
            tab.show(); // Muestra la pestaña correspondiente
        } else {
            console.log(`No se encontró una pestaña para el hash: ${hash}`);
        }
    } else {
        console.log("No hay hash en la URL.");
    }

}