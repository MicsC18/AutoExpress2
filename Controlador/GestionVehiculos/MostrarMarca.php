<?php
   
    require_once('../../Conexion/Conexion.php'); 
    try {
    
        if (!$conn) {
            throw new Exception("No se pudo establecer la conexión a la base de datos.");
        }

        // Consulta para obtener las marcas
        $stmt = $conn->query("SELECT * FROM marcas");
        
        // Comprobar si hay resultados
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>
                           <button type='button' class='btn btn-secondary btn-sm btnEditarMarca' data-id='{$row['id_marca']}' data-bs-toggle='modal' data-bs-target='#editarMarcaModal'>Editar</button>
                           <button type='button' class='btn btn-danger btn-sm EliminarMarcaBtn' data-id='{$row['id_marca']}'>Eliminar</button>
                    </td>";
                echo "</tr>";
             
            }
        } else {
            echo "<tr><td colspan='2'>No hay marcas disponibles</td></tr>";
        }
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
?>
