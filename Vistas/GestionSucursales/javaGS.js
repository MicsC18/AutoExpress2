document.addEventListener('DOMContentLoaded', function() {
    const selectRol = document.getElementById('NuevoRol');
    const nombreUsuario = document.getElementById('nombreUsuario');
    const claveUsuario = document.getElementById('claveUsuario');
    const sucursal = document.getElementById('SucursalUsuario');
    

    // Agregar el evento change para manejar cuando se cambia el rol
    selectRol.addEventListener('change', function() {
        const rolSeleccionado = selectRol.value;
        console.log(rolSeleccionado.value);

        if (!rolSeleccionado) {
            nombreUsuario.disabled = true;
            claveUsuario.disabled = true;
            sucursal.classList.add('d-none');  // Ocultamos el campo de sucursal
        } else {
            if (rolSeleccionado === 4) {
                nombreUsuario.disabled = false;
                claveUsuario.disabled = false;
                sucursal.classList.remove('d-none');  // Mostramos el campo de sucursal
            } else {
                nombreUsuario.disabled = false;
                claveUsuario.disabled = false;
                sucursal.classList.add('d-none');  // Ocultamos el campo de sucursal
            }
        }
    });
});
