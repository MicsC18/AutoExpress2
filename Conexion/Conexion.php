<?php

if (!isset($conn)) {
    
    // Detalles de la conexión
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db = "pasalibros";
    
    try {
        // Crea la conexión
        $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
        
        // Configura PDO para lanzar excepciones en caso de error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        // Maneja el error de conexión
        die("Error en la conexión de base de datos: " . $e->getMessage());
    }
}

?>

