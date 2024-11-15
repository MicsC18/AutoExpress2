<?php
    include_once('../../Conexion/Conexion.php');

    try {
        if (!$conn) {
            throw new Exception("No se pudo establecer la conexión a la base de datos.");
        }

        $stmt = $conn->query( "SELECT * FROM unidades");
        $stmt->execute();

        if ( $stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['color']}</td>";
                echo "<td>{$row['puertas']}</td>";
                echo "<td>{$row['aire_acondicionado']}</td>";
                echo "<td>{$row['transmision']}</td>";
                echo "<td>{$row['combustible']}</td>";
                echo "<td>{$row['cantidad_personas']}</td>";
                echo "<td>{$row['cantidad_maletas']}</td>";
                echo "<td><img src='{$row['imagen_url']}' alt='Imagen del vehículo' width='50'></td>";
                echo "<td>{$row['id_modelo']}</td>";
                echo "<td>{$row['id_marca']}</td>";
                echo "<td>{$row['disponibilidad']}</td>";
                echo "<td>
                        <button type='button' class='btn btn-secondary btn-sm btnEditarUnidad' data-id='{$row['id_unidad']}' data-bs-toggle='modal' data-bs-target='#modalEditarUnidad'>Editar</button>
                        <button type='button' class='btn btn-danger btn-sm EliminarUnidadBTN' data-id='{$row['id_unidad']}' data-bs-toggle='modal' data-bs-target='#EliminarUnidadModal'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12' class='text-center'>No hay unidades disponibles</td></tr>";
        }
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
?>
