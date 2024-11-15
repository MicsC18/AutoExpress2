<?php
    session_start();

    require('../../Modelo/marca.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nombreMarca = trim($_POST["nombreMarca"]);
        
        // Validación: campo vacío
        if(empty($nombreMarca) || strlen($nombreMarca) < 3 ){
            echo('mal');
            exit();
        }

      
        $objMarca = new Marca('', $nombreMarca,);
        $existe=$objMarca->NoDobles($nombreMarca);

        if($existe){
            $_SESSION['mensaje'] = 'La marca ya existe.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
        }else{
            $objMarca->agregar();
            $_SESSION['mensaje'] = 'Marca agregada exitosamente.'; 
            $_SESSION['tipo_mensaje'] = 'success';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php');
        }
        exit();
    }
?>
