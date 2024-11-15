<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Validar el ID de rol recibido
    $rol_id = $data['rol_id'];

    $requiereSucursal = ($rol_id == 4);

    header('Content-Type: application/json');  // Asegurarte de que el tipo de contenido sea JSON
    echo json_encode(['requiereSucursal' => $requiereSucursal]);
}
?>
