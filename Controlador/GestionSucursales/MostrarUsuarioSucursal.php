<?php
require_once(__DIR__.'/../../Conexion/Conexion.php');
require_once(__DIR__.'../../../Modelo/empleados.php');
require_once(__DIR__.'../../../Modelo/administradores.php');

try {
    if (!$conn) {
        throw new Exception("No se pudo establecer la conexión a la base de datos.");
    }

    $stmt = $conn->query("SELECT a.id_administrador AS id_usuario,
                                a.nombre AS nombre_usuario,
                                'Administrador' AS rol
                            FROM 
                                administradores a
                            UNION
                            SELECT 
                                e.id_empleado_sucursal AS id_usuario,
                                e.nombre AS nombre_usuario,
                                'Empleado' AS rol
                            FROM 
                                empleados_sucursales e;
                            ");
    $stmt->execute(); 

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id_usuario']}</td>";
            echo "<td>{$row['nombre_usuario']}</td>";
            echo "<td>{$row['rol']}</td>";
            echo "<td>
                    <button type='button' class='btn btn-secondary btn-sm btnAsignarEmpleado' data-id='{$row['id_usuario']}' data-bs-toggle='modal' data-bs-target='#AgregarUsuarioModal'>Editar Rol</button>
                    <button type='button' class='btn btn-danger btn-sm btnEliminarEmpleado' data-id='{$row['id_usuario']}' data-bs-toggle='modal' data-bs-target='#modalEliminarUsuario'>Eliminar</button>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No hay usuarios disponibles</td></tr>";
    }
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
