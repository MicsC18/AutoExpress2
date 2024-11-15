<?php
   
    require_once('../../Conexion/Conexion.php'); 
    
    try {
        if (!$conn) {
            throw new Exception("No se pudo establecer la conexión a la base de datos.");
        }

        $stmt = $conn->query("SELECT * FROM modelos");
        $stmt->execute(); 

        
        if ($stmt->rowCount() > 0) {
            // Generar las filas de la tabla dinámicamente
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['modelo']}</td>";
                echo "<td>{$row['id_marca']}</td>";
                echo "<td>{$row['fabricacion']}</td>";
                echo "<td>{$row['tipo_vehiculo']}</td>";
                echo "<td>
                           <button type='button' class='btn btn-secondary btn-sm btnEditarModelo' data-id='{$row['id_modelo']}' data-bs-toggle='modal' data-bs-target='#ModeloEditar'>Editar</button>
                           <button type='button' class='btn btn-danger btn-sm EliminarModeloBtn' data-id='{$row['id_modelo']}' data-bs-toggle='modal' data-bs-target='#modalEliminarModelo'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay modelos disponibles</td></tr>";
        }
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
?>
