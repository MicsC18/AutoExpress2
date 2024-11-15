<?php
    include_once('../../Conexion/Conexion.php');
    include_once(__DIR__.'/../../Modelo/empleados.php');

    $empleados = new empleados('','','','');
    $datos = $empleados->mostrar(); 

    if ($datos) {
        if (count($datos) > 0) {
            foreach ($datos as $row) {
                echo "<tr>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['id_sucursal']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12' class='text-center'>No hay empleados disponibles</td></tr>";
        }
    } else {
        echo "<tr><td colspan='12' class='text-center'>Error al obtener los datos</td></tr>";
    }
?>
