<?php
    session_start();
    require_once('../../Modelo/unidades.php');
    require_once('../../Modelo/marca.php');
    require_once('../../Modelo/modelo.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUnidad=$_POST['idUnidad'];

        if(empty($idUnidad)){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
            exit();
        }
    
        
        $objUnidad= new unidades('','','','','','','','','','','','');
        
        $eliminar=$objUnidad->eliminar($idUnidad);
        if($eliminar){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
            exit();
        }else{
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Ha ocurrido un error al eliminar el modelo, inténtelo más tarde.';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos');
            exit();
        }   
    }
?>