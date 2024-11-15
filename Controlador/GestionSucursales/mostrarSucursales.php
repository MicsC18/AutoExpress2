<?php
    include_once('../../Conexion/Conexion.php');
    include_once(__DIR__.'/../../Modelo/sucursales.php');

    $sucursales = new sucursales('','','','','');
    $datos = $sucursales->mostrar(); 

    if ($datos) {
        if (count($datos) > 0) {
            foreach ($datos as $row) {
                echo "<tr>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['provincia']}</td>";
                echo "<td>{$row['c_postal']}</td>";
                echo "<td>{$row['ubicacion']}</td>";
                echo "<td>
                        <button type='button' class='btn btn-secondary btn-sm ' data-id='{$row['id_sucursal']}' data-bs-toggle='modal' data-bs-target='#editarSucursalModal'>Editar</button>
                        <button type='button' class='btn btn-danger btn-sm ' data-id='{$row['id_sucursal']}' data-bs-toggle='modal' data-bs-target='#modalEliminarSucursal'>Eliminar</button>
                        <button type='button' class='btn btn-warning btn-sm btnAgregarEmpleado' data-id='{$row['id_sucursal']}' data-bs-toggle='modal' data-bs-target='#AsignarEmpleadoModal'>Asignar Empleado</button>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12' class='text-center'>No hay sucursales disponibles</td></tr>";
        }
    } else {
        echo "<tr><td colspan='12' class='text-center'>Error al obtener los datos</td></tr>";
    }
?>
