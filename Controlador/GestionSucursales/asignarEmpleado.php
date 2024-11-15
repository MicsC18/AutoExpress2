<?php
    session_start();

    require_once(__DIR__.'../../../Conexion/Conexion.php');
    require_once(__DIR__.'../../../Modelo/empleados.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $idSucursal=$_POST['idSucursal'];
        $Empleadonombre = $_POST["Empleadonombre"];
        $empleadoClave = $_POST['Empleadoclave'];

        /*var_dump($_POST);
        exit();*/


        if(empty($idSucursal) || empty($Empleadonombre)|| empty($empleadoClave)){
            echo('mal');
            exit();
        }

        $objEmpleado = new empleados('',$Empleadonombre,$idSucursal, $empleadoClave);
        $agregar=$objEmpleado->agregar();

        if($agregar){
            $_SESSION['mensaje'] = 'Empleado Asignado exitosamente.'; 
            $_SESSION['tipo_mensaje'] = 'success';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php');
            exit();
        }else{
            $_SESSION['mensaje'] = 'Ha ocurrido un error.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php');
            exit();
        }
        exit();
    }
?>
