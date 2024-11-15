<?php

require "../includes/conectarDB.php";

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["id_unidad"])){
        $_SESSION['id_unidad'] = $_POST["id_unidad"];

        $query = "SELECT * FROM unidades WHERE id_unidad = :id_unidad";
        $resQuery = $conn->prepare($query);
        $resQuery->bindParam(":id_unidad", $_POST["id_unidad"]);
        $resQuery->execute();

        $unidad = $resQuery->fetch(PDO::FETCH_ASSOC);

        if(!empty($unidad)){
            $id_marca = $unidad["id_marca"];
            $id_modelo = $unidad["id_modelo"];

            $query = "SELECT * FROM marcas WHERE id_marca = :id_marca";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":id_marca", $id_marca);
            $resQuery->execute();

            $marca = $resQuery->fetch(PDO::FETCH_ASSOC);

            if(!empty($marca)){
                $_SESSION["marca"] = $marca["nombre"];
            }

            $query = "SELECT * FROM modelos WHERE id_modelo = :id_modelo";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":id_modelo", $id_modelo);
            $resQuery->execute();

            $modelo = $resQuery->fetch(PDO::FETCH_ASSOC);

            if(!empty($marca)){
                $_SESSION["modelo"] = $modelo["modelo"];
            }
        }
    }

    echo "success";
} else {
    echo "error";
}

?>