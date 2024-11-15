<?php
session_start();
require_once('../../Modelo/modelo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombreModelo = $_POST["nombreModelo"];
    $MarcaModelo = $_POST["MarcaModelo"];
    $fabricacion = $_POST["fabricacion"];
    $tipo = $_POST["tipoVehiculo"];

    if (empty($nombreModelo) || empty($MarcaModelo) || empty($fabricacion) || empty($tipo)) {
        echo('vacios');
        exit();
    }

    if (strlen($nombreModelo) < 3 || $fabricacion > 2025) {
        echo('mal');
        exit();
    }
    
    $objModelo = new modelo('',$nombreModelo, $MarcaModelo, $fabricacion, $tipo);
    if ($objModelo->NoDobles($nombreModelo, $MarcaModelo)) {
        $_SESSION['mensaje'] = 'El modelo ya fue agregado.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos'); 
        exit();
    }else{
        
        $agregar = $objModelo->agregar();
        if ($agregar) {
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos'); 
            exit();
        } else {
            $_SESSION['mensaje'] = 'Ha ocurrido un error al agregar el modelo: '; 
            $_SESSION['tipo_mensaje'] = 'warning';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos'); 
            exit();
        }
    }
    
    
}
?>
