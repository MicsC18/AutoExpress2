<?php

require "../includes/conectarDB.php";

if (isset($_SESSION['id']) && isset($_SESSION['id_unidad']) && isset($_SESSION['id_sucursal_entrega']) && isset($_SESSION['id_sucursal_devolucion']) && isset($_SESSION['fecha_entrega']) && isset($_SESSION['fecha_devolucion'])) {
    $query = "INSERT INTO reservas (fecha_entrega, fecha_devolucion, id_cliente, id_unidad, id_sucursal_entrega, id_sucursal_devolucion) VALUES (:fecha_entrega, :fecha_devolucion, :id_cliente, :id_unidad, :id_sucursal_entrega, :id_sucursal_devolucion)";

    $resQuery = $conn->prepare($query);
    $resQuery->bindParam(":fecha_entrega", $_SESSION['fecha_entrega']);
    $resQuery->bindParam(":fecha_devolucion", $_SESSION['fecha_devolucion']);
    $resQuery->bindParam(":id_cliente", $_SESSION['id']);
    $resQuery->bindParam(":id_unidad", $_SESSION['id_unidad']);
    $resQuery->bindParam(":id_sucursal_entrega", $_SESSION['id_sucursal_entrega']);
    $resQuery->bindParam(":id_sucursal_devolucion", $_SESSION['id_sucursal_devolucion']);

    $resQuery->execute();

    $insertOK = $conn->lastInsertId();

    if($insertOK){
        echo "success";
    } else{
        echo "error";
    }
} else {
    echo "error";
}

?>