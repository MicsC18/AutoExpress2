<?php
require_once(__DIR__.'/../../Conexion/Conexion.php');

$sql = "SELECT id_sucursal, nombre FROM sucursales";
$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    $sucursales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($sucursales);  
} else {
    echo json_encode(['error' => 'Error al obtener las sucursales']);
}
?>
