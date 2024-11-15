<?php

require "../includes/conectarDB.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['filtro']) && isset($_POST['valor'])) {

        $filtro = $_POST['filtro'];
        $valor = $_POST['valor'];

        if ($filtro === 'combustible') {

            $query = "SELECT * FROM unidades WHERE combustible = :combustible";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":combustible", $valor);
            $resQuery->execute();

            if ($combustible = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                echo json_encode($combustible);
            } else {
                echo json_encode('error');
            }
        }

        if ($filtro === 'plazas') {

            $query = "SELECT * FROM unidades WHERE plazas > :plazas";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":plazas", $valor);
            $resQuery->execute();

            if ($plazas = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                echo json_encode($plazas);
            } else {
                echo json_encode('error');
            }
        }

        if ($filtro === 'modelo') {
            $query = "SELECT * FROM modelos WHERE modelo = :modelo";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":modelo", $valor);
            $resQuery->execute();

            if ($dato = $resQuery->fetch(PDO::FETCH_ASSOC)) {
                
                $id_modelo = $dato['id_modelo'];
                $modelo = $dato['modelo'];

                $query = "SELECT * FROM unidades WHERE id_modelo = :id_modelo";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(":id_modelo", $id_modelo);
                $resQuery->execute();

                if ($modelos = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                    foreach($modelos as &$value){
                        $marca = $value['id_marca'];

                        $query = "SELECT * FROM marcas WHERE id_marca = :id_marca";
                        $resQuery = $conn->prepare($query);
                        $resQuery->bindParam("id_marca", $marca);
                        $resQuery->execute();
                
                        if($dato = $resQuery->fetch(PDO::FETCH_ASSOC)){
                            $value['id_marca'] = $dato['nombre'];
                            $value['id_modelo'] = $modelo;
                        }
                    }

                    echo json_encode($modelos);
                } else {
                    echo json_encode('error');
                }
            } else {
                echo json_encode('error');
            }
        }

        if ($filtro === 'tipo') {
            $query = "SELECT * FROM modelos WHERE tipo_vehiculo = :tipo_vehiculo";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":tipo_vehiculo", $valor);
            $resQuery->execute();

            if ($dato = $resQuery->fetch(PDO::FETCH_ASSOC)) {
                $id_modelo = $dato['id_modelo'];
                $modelo = $dato['modelo'];

                $query = "SELECT * FROM unidades WHERE id_modelo = :id_modelo";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(":id_modelo", $id_modelo);
                $resQuery->execute();

                if ($modelos = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                    foreach($modelos as &$value){
                        $marca = $value['id_marca'];

                        $query = "SELECT * FROM marcas WHERE id_marca = :id_marca";
                        $resQuery = $conn->prepare($query);
                        $resQuery->bindParam("id_marca", $marca);
                        $resQuery->execute();
                
                        if($dato = $resQuery->fetch(PDO::FETCH_ASSOC)){
                            $value['id_marca'] = $dato['nombre'];
                            $value['id_modelo'] = $modelo;
                        }
                    }

                    echo json_encode($modelos);
                } else {
                    echo json_encode('error');
                }
            } else {
                echo json_encode('error');
            }
        }

        if ($filtro === 'marca') {

            $query = "SELECT * FROM marcas WHERE nombre = :nombre";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(":nombre", $valor);
            $resQuery->execute();

            if ($marca = $resQuery->fetch(PDO::FETCH_ASSOC)) {
                $id_marca = $marca['id_marca'];
                $nombre = $marca['nombre'];

                $query = "SELECT * FROM unidades WHERE id_marca = :id_marca";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(":id_marca", $id_marca);
                $resQuery->execute();

                if ($marcas = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                    
                    foreach($marcas as &$value){
                        $modelo = $value['id_modelo'];

                        $query = "SELECT * FROM modelos WHERE id_modelo = :id_modelo";
                        $resQuery = $conn->prepare($query);
                        $resQuery->bindParam("id_modelo", $modelo);
                        $resQuery->execute();
                
                        if($dato = $resQuery->fetch(PDO::FETCH_ASSOC)){
                            $value['id_modelo'] = $dato['modelo'];
                            $value['id_marca'] = $nombre;
                        }
                    }
                    echo json_encode($marcas);
                } else {
                    echo json_encode('error');
                }
            } else {
                echo json_encode('error');
            }
        }
    } else {
        echo json_encode('error');
    }
} else {
    echo json_encode('error');
}





?>