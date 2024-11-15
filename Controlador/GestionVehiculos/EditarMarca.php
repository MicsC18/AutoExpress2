<?php

session_start();

include_once('../../Modelo/marca.php');
require_once('../../Conexion/Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_marca = $_POST['id_marca'] ?? null;
    $nombreMarcaNueva = $_POST['nombreMarcaNueva'] ?? '';

    if (empty($id_marca) || empty($nombreMarcaNueva) || strlen($nombreMarcaNueva) < 3) {
        $_SESSION['mensaje'] = 'ID de marca o nombre inválido.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
        exit();
    }

    $objMarca = new marca($id_marca, $nombreMarcaNueva,'');
    $existe = $objMarca->NoDobles($nombreMarcaNueva);
    
    if ($existe) {
        $_SESSION['mensaje'] = 'La marca ya existe.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
        exit();
    } else {
        $editar = $objMarca->editar($nombreMarcaNueva, $id_marca);
        if ($editar) {
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
            exit();
        } else {
            $_SESSION['mensaje'] = 'Error al editar la marca.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
            exit();
        }
    }
}


?>
