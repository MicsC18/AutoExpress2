<?php

session_start();

require "../includes/conectarDB.php";
$query = "SELECT * FROM sucursales ORDER BY provincia ASC";
$resQuery = $conn->prepare($query);
$resQuery->execute();

$sucursales = $resQuery->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($sucursales);
?>