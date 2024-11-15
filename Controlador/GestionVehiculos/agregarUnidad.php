<?php

    session_start();
    include_once('../../Conexion/Conexion.php');
    include_once('../../Modelo/unidades.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $marcaUnidad = $_POST['marcaUnidad'];
        $modeloUnidad = $_POST['modeloUnidad'];
        $color = $_POST['color'];
        $puertas = $_POST['puertas'];
        $aireAcondicionado = $_POST['aireAcondicionado'];
        $transmision = $_POST['transmision'];
        $combustible = $_POST['combustible'];
        $cantidadPersonas = $_POST['cantidadPersonas'];
        $cantidadMaletas = $_POST['cantidadMaletas'];
        $imagenUrl = $_POST['imagenUrl'];
        $disponibilidad = $_POST['disponibilidad'];

        if(empty($marcaUnidad) || empty($modeloUnidad) || empty($color) || empty($puertas) || empty($aireAcondicionado) || empty($transmision) ||empty($combustible) || empty($cantidadPersonas) || empty($cantidadMaletas) || empty($imagenUrl) || empty($disponibilidad)){
            //echo'vacio';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
            exit();
        }

        $unidad=new unidades(
            '',
            $color,
            $puertas,
            $aireAcondicionado,
            $transmision,
            $combustible,
            $cantidadPersonas,
            $cantidadMaletas,
            $imagenUrl,
            $modeloUnidad,
            $marcaUnidad,
            $disponibilidad
        );

        $objUnidad=$unidad->agregar();

        if($objUnidad){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
            exit();
        }else{
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Ha ocurrido un error';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
            exit();
        }

        header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidades');
        exit();
    }
?>