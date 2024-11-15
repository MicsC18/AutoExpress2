$(document).ready(function() {

    $(document).on('click', '.btnEditarMarca', function() {
        var idMarca = $(this).data('id'); 
        $('#idMarca').val(idMarca); 
    });
    
    $('#editarMarcaForm').on('submit', function(event) {
        event.preventDefault();

        var idMarca = $('#idMarca').val();
        var nombreMarcaNueva = $('#nombreMarcaNueva').val();

        $.ajax({
            url: '../../Controlador/GestionVehiculos/EditarMarca.php',
            type: 'POST',
            data: { id_marca: idMarca, nombreMarcaNueva: nombreMarcaNueva },
            dataType: 'json',
            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                    $('#editarMarcaModal').modal('hide'); // Cierra el modal
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en AJAX: " + error);
                alert("Error en la solicitud: " + xhr.status + " " + xhr.statusText);
            }
        });
    });

    $(document).on('click', '.EliminarMarcaBtn', function() {
        var idMarca = $(this).data('id'); 
        $('#idMarca').val(idMarca); 
        $('#modalEliminarMarca').modal('show'); 
    });

    $('#btnEliminarConfirmacionMarca').on('click', function() {
        var idMarca = $('#idMarca').val();
        $.ajax({
            url: '../../Controlador/GestionVehiculos/eliminarMarca.php',
            type: 'POST',
            data: { idMarca: idMarca },
            dataType: 'json',
            success: function(response) {
                if (response.status === "success") {
                    window.location.href = response.redirect_url;
                } else {
                    alert("Error en la eliminación: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en AJAX: " + error);
            }
          
        });
    });

});

