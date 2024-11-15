<?php
session_start();
require_once(__DIR__.'../../../Conexion/Conexion.php');
require_once(__DIR__.'../../../Modelo/roles_usuarios.php');
require_once(__DIR__.'../../../Modelo/administradores.php');
require_once(__DIR__.'../../../Modelo/empleados.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $IdUsuarioGS = $_POST['IdUsuarioGS'];
    $idRolNuevo = $_POST['NuevoRolUsuario'];
    $nombreUsuario = $_POST['NombreUsuarioSeleccionado'];
    $sucursalAsignadaUsuario = $_POST['sucursalAsignadaUsuario'];

    /*var_dump($_POST); 
    var_dump($IdUsuarioGS, $idRolNuevo, $nombreUsuario, $sucursalAsignadaUsuario); // Imprime varias variables
    exit();*/

    if (empty($IdUsuarioGS) || empty($idRolNuevo) || empty($nombreUsuario)) {
        $_SESSION['tipo_mensaje'] = 'Error';
        $_SESSION['mensaje'] = 'Faltan datos, por favor completa todos los campos.';
        header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
        exit();
    }

   
    $objEmpleado = new empleados('','','',''); 
    $objAdministrador = new administradores('','','');
    
    $esAdmin = $objAdministrador->verificarAdministrador($IdUsuarioGS, $nombreUsuario); 
    
    if ($esAdmin) {
        if ($idRolNuevo == 4) { 

            $clave = $objAdministrador->ObtenerClave($IdUsuarioGS);
            
            if ($clave === false) {
                $_SESSION['tipo_mensaje'] = 'Error';
                $_SESSION['mensaje'] = 'No se pudo obtener la clave del administrador.';
                header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
                exit();
            }

            $objAdministrador->eliminar($IdUsuarioGS);

            $nuevoEmpleado=new empleados('',$nombreUsuario,$sucursalAsignadaUsuario,$clave);
            $EmpleadoAgregado = $nuevoEmpleado->agregar();
            if ($EmpleadoAgregado) {
                $_SESSION['tipo_mensaje'] = 'Success';
                $_SESSION['mensaje'] = 'El rol fue asignado correctamente.';
                header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
                exit();
            } else {
                $_SESSION['tipo_mensaje'] = 'Error';
                $_SESSION['mensaje'] = 'Hubo un error al asignar el rol de empleado.';
                header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
                exit();
            }
        }
    }

    $esEmpleado = $objEmpleado->verificarEmpleado($IdUsuarioGS, $nombreUsuario);
    if ($esEmpleado) {
    
        $claveEmpleado = $objEmpleado->ObtenerClave($IdUsuarioGS);
        if ($claveEmpleado === false) {
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'No se pudo obtener la clave del empleado.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }

        $objEmpleado->eliminar($IdUsuarioGS);

        $NuevoAdmin=new administradores('',$nombreUsuario,$claveEmpleado);     
        $AdminAgregado = $NuevoAdmin->agregar();
        if ($AdminAgregado) {
            $_SESSION['tipo_mensaje'] = 'Success';
            $_SESSION['mensaje'] = 'El rol fue asignado correctamente.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        } else {
            $_SESSION['tipo_mensaje'] = 'Error';
            $_SESSION['mensaje'] = 'Hubo un error al asignar el rol de administrador.';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }
    }

    exit();
}
?>
