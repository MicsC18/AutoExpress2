<?php

require_once('../../Conexion/Conexion.php');
require_once('../../Modelo/marca.php');


if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id_marca = $_POST['idMarca'] ?? null;
 
    if (empty($id_marca)) {
        echo json_encode(["status" => "error", "message" => "ID de marca no encontrada."]);
        exit();
    }

    $objMarca = new marca('', '');
    $eliminar = $objMarca->eliminar($id_marca);

    if ($eliminar) {
        echo json_encode(["status" => "success", "message" => "Marca eliminada exitosamente.", "redirect_url" => "../../Vistas/GestionVehiculos/IndexGV.php"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al eliminar la marca."]);
    }
    exit();

} else {
    echo json_encode(["status" => "error", "message" => "Método de solicitud no válido."]);
    exit();
}

?>
