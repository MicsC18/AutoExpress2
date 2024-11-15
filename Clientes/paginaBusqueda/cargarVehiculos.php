<?php 

require "../includes/conectarDB.php";

$query = "SELECT * FROM unidades WHERE disponibilidad = 1";
$resQuery = $conn->prepare($query);
$resQuery->execute();

if($unidades = $resQuery->fetchAll(PDO::FETCH_ASSOC)){
    foreach($unidades as &$v){
        $marca = $v['id_marca'];
        $modelo = $v['id_modelo'];
        if($v["aire_acondicionado"] == 1){
            $v["aire_acondicionado"] = "Si";
        } else {
            $v["aire_acondicionado"] = "No";
        }

        $query = "SELECT * FROM marcas WHERE id_marca = :id_marca";
        $resQuery = $conn->prepare($query);
        $resQuery->bindParam("id_marca", $marca);
        $resQuery->execute();

        if($marca = $resQuery->fetch(PDO::FETCH_ASSOC)){
            $v['id_marca'] = $marca['nombre'];
        }

        $query = "SELECT * FROM modelos WHERE id_modelo = :id_modelo";
        $resQuery = $conn->prepare($query);
        $resQuery->bindParam("id_modelo", $modelo);
        $resQuery->execute();

        if($modelo = $resQuery->fetch(PDO::FETCH_ASSOC)){
            $v['id_modelo'] = $modelo['modelo'];
        }
    }
    echo json_encode($unidades);
} else {
    echo json_encode('error');
}
?>