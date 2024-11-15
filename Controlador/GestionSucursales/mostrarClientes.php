<?php
    include_once('../../Conexion/Conexion.php');
    include_once(__DIR__.'/../../Modelo/clientes.php');

    $clientes = new clientes('','','','');
    $datos = $clientes->mostrar(); 

    if ($datos) {
        if (count($datos) > 0) {
            foreach ($datos as $row) {
                echo "<tr>";
                echo "<td>{$row['usuario']}</td>";
                echo "<td>{$row['correo']}</td>";
                echo "<td>
                        <button type='button' class='btn btn-secondary btn-sm ' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#'>Editar</button>
                        <button type='button' class='btn btn-warning btn-sm ' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#'>Asignar Rol</button>
                        <button type='button' class='btn btn-danger btn-sm ' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12' class='text-center'>No hay empleados disponibles</td></tr>";
        }
    } else {
        echo "<tr><td colspan='12' class='text-center'>Error al obtener los datos</td></tr>";
    }
?>
