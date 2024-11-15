<?php
    session_start();
    require_once(__DIR__.'../../../Conexion/Conexion.php');
    require_once(__DIR__.'../../../Modelo/empleados.php');
    require_once(__DIR__.'../../../Modelo/administradores.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $id_EliminarUsuario = $_POST['id_EliminarUsuario'];

        if(empty($id_EliminarUsuario)){
            //echo'vacio';
            header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
            exit();
        }

        $stmt = $conn->prepare("
            SELECT 
                a.id_administrador AS id_usuario,
                a.nombre AS nombre_usuario,
                'Administrador' AS rol
            FROM 
                administradores a
            WHERE 
                a.id_administrador = :id_usuario
            UNION
            SELECT 
                e.id_empleado_sucursal AS id_usuario,
                e.nombre AS nombre_usuario,
                'Empleado' AS rol
            FROM 
                empleados_sucursales e
            WHERE 
                e.id_empleado_sucursal = :id_usuario
        ");
        $stmt->bindParam(':id_usuario', $id_EliminarUsuario, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {

            $_SESSION['mensaje'] = 'Usuario encontrado: ' . $resultado['nombre_usuario'] . ' - Rol: ' . $resultado['rol'];
            $_SESSION['tipo_mensaje'] = 'warning';  
      
            
            if ($resultado['rol'] === 'Administrador' || $resultado['rol'] === 'Administrador de sucursal') {
                $deleteStmt = $conn->prepare("DELETE FROM administradores WHERE id_administrador = :id_usuario");
            } elseif ($resultado['rol'] === 'Empleado') {
                $deleteStmt = $conn->prepare("DELETE FROM empleados_sucursales WHERE id_empleado_sucursal = :id_usuario");
            }

            if (isset($deleteStmt)) {
                $deleteStmt->bindParam(':id_usuario', $id_EliminarUsuario, PDO::PARAM_INT);
                if ($deleteStmt->execute()) {
                    $_SESSION['mensaje'] = 'Usuario eliminado exitosamente.';
                    $_SESSION['tipo_mensaje'] = 'success';
                } else {
                    $_SESSION['mensaje'] = 'Ha ocurrido un error al eliminar el usuario.';
                    $_SESSION['tipo_mensaje'] = 'error';
                  
                }
            }
    
        } else {
            $_SESSION['mensaje'] = 'El usuario no existe.';
            $_SESSION['tipo_mensaje'] = 'error';
           
        }
        header('Location: ../../Vistas/GestionSucursales/indexGS.php#usuarios');
        exit();
    }
?>