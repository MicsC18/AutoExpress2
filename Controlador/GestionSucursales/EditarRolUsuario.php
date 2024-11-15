<?php

    session_start();

    require_once(__DIR__.'../../../Conexion/Conexion.php');
    require_once(__DIR__.'../../../Modelo/roles_usuarios.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $IdUsuario=$_POST['IdUsuario'];
       
        $idRolNuevo=$_POST['NuevoRol'];

        if(empty($IdUsuario) || empty($idRolNuevo)){
            echo('mal');
            exit();
        }

        $objroles = new roles_usuarios('','','');
        $editar=$objroles->editar($idRolNuevo,$IdUsuario);

        if($editar){
            $_SESSION['mensaje'] = 'Empleado Asignado exitosamente.'; 
            $_SESSION['tipo_mensaje'] = 'success';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }else{
            $_SESSION['mensaje'] = 'Ha ocurrido un error.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }
        exit();
    }
?>


