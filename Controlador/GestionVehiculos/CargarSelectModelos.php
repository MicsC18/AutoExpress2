<?php

    include_once('../../Conexion/Conexion.php');
    include_once('../../Modelo/unidades.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $idMarcaSelect=$_POST['idMarcaUnidad'];

        if(empty($idMarcaSelect)){
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#unidad');
        }

        $sql = "SELECT id_modelo, modelo FROM modelos
        INNER JOIN marcas ON modelos.id_marca = marcas.id_marca
        WHERE modelos.id_marca = :id_marca";

        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':id_marca', $idMarcaSelect, PDO::PARAM_INT);
        $stmt->execute();
        $modelos=$stmt->fetchAll(PDO::FETCH_ASSOC);
   
        echo json_encode ($modelos);
    }


?>