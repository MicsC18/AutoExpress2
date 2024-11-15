<?php
session_start();
require_once(__DIR__ . '../../../Conexion/Conexion.php');
require_once(__DIR__ . '../../../Modelo/administradores.php');
require_once(__DIR__ . '../../../Modelo/empleados.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombreUsuario']; 
    $clave = $_POST['claveUsuario'];  
    $rol_id = $_POST['NuevoRol'];  

    if ($rol_id == 4) {  
        $sucursal_id = $_POST['SucursalUsuario'];  

        if (empty($sucursal_id)) {
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Debe seleccionar una sucursal para asignar a un empleado.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }

        $objEmpleado = new empleados('', $nombre, $sucursal_id, $clave);
        $agregar = $objEmpleado->agregar();

        if ($agregar) {
            $_SESSION['tipo_mensaje'] = 'success';
            $_SESSION['mensaje'] = 'Empleado asignado exitosamente.'; 
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        } else {
            $_SESSION['mensaje'] = 'Ha ocurrido un error al agregar el empleado.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }
    }

    if ($rol_id == 2 || $rol_id==3) { 
     
        $objAdministrador = new administradores('', $nombre, $clave);
        $agregarAdministrador = $objAdministrador->agregar();

        if ($agregarAdministrador) {
            $_SESSION['tipo_mensaje'] = 'success';
            $_SESSION['mensaje'] = 'Administrador agregado exitosamente.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        } else {
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Error al agregar el administrador, Intente nuevamente.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }
    }

    header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
    exit();
}
?>
