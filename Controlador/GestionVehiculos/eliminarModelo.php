<?php
    session_start();
    require_once('../../Modelo/modelo.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idModelo=$_POST['id_modeloEliminar'];

        if(empty($idModelo)){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos');
            exit();
        }
    
        $objModelo= new modelo('','','','','');
        $eliminar=$objModelo->eliminar($idModelo);
        if($eliminar){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos');
            exit();
        }else{
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Ha ocurrido un error al eliminar el modelo, inténtelo más tarde.';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos');
            exit();
        }   
    }
?>