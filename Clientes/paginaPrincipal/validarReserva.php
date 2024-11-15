<?php

session_start();

$dirbase = "/AutoExpress/Clientes";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "../includes/conectarDB.php";

    $errores = [];

    if (!empty($_POST)) {

        if (isset($_POST["suc-retiro"]) && isset($_POST["suc-devolucion"])) {

            //Validacion Sucursal de Retiro
            if (empty($_POST["suc-retiro"])) {
                $errores["sucretiro"] = "Debe ingresar la sucursal de retiro.";
            } else {
                $query = "SELECT * FROM sucursales WHERE id_sucursal = :id";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(":id", $_POST["suc-retiro"]);
                $resQuery->execute();

                if (empty($dato = $resQuery->fetch(PDO::FETCH_ASSOC))) {
                    $errores["sucretiro"] = "No existe la sucursal ingresada.";
                }
            }

            //Validacion Sucursal de Devolucion
            if (empty($_POST["suc-devolucion"])) {
                $errores["sucdevolucion"] = "Debe ingresar la sucursal de devolucion.";
            } else {
                $query = "SELECT * FROM sucursales WHERE id_sucursal = :id";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(":id", $_POST["suc-devolucion"]);
                $resQuery->execute();

                if (empty($dato = $resQuery->fetch(PDO::FETCH_ASSOC))) {
                    $errores["sucdevolucion"] = "No existe la sucursal ingresada.";
                }
            }
        }

        if (isset($_POST["fecha-retiro"]) && isset($_POST["fecha-devolucion"]) && isset($_POST["hora-retiro"]) && isset($_POST["hora-devolucion"])) {

            $fechaValida = "/^\d{4}-\d{2}-\d{2}$/";
            $horaValida = "/^\d{2}:\d{2}$/";

            // Validacion Fecha de Retiro
            if (empty($_POST["fecha-retiro"])) {
                $errores["fecharetiro"] = "Debe ingresar la fecha de retiro.";
            } else {
                if (!preg_match($fechaValida, $_POST["fecha-retiro"])) {
                    $errores["fecharetiro"] = "La fecha de retiro ingresada es invalida.";
                }
            }

            // Validacion Fecha de Devolucion
            if (empty($_POST["fecha-devolucion"])) {
                $errores["fechadevolucion"] = "Debe ingresar la fecha de devolucion.";
            } else {
                if (!preg_match($fechaValida, $_POST["fecha-devolucion"])) {
                    $errores["fechadevolucion"] = "La fecha de devolucion ingresada es invalida.";
                }
            }

            //Validacion Hora de Retiro
            if (empty($_POST["hora-retiro"])) {
                $errores["horaretiro"] = "Debe ingresar la hora de retiro.";
            } else {
                if (!preg_match($horaValida, $_POST["hora-retiro"])) {
                    $errores["horaretiro"] = "La hora de retiro ingresada es invalida.";
                }
            }

            //Validacion Hora de Devolucion
            if (empty($_POST["hora-devolucion"])) {
                $errores["horadevolucion"] = "Debe ingresar la hora de devolucion.";
            } else {
                if (!preg_match($horaValida, $_POST["hora-devolucion"])) {
                    $errores["horadevolucion"] = "La hora de devolucion ingresada es invalida.";
                }
            }
        }

        if (count($errores) > 0) {
            echo json_encode(['error' => $errores]);
        } else {
            $_SESSION['id_sucursal_entrega'] = $_POST['suc-retiro'];
            $_SESSION['id_sucursal_devolucion'] = $_POST['suc-devolucion'];

            $_SESSION['fecha_entrega'] = $_POST['fecha-retiro'] . ' ' . $_POST['hora-retiro'];
            $_SESSION['fecha_devolucion'] = $_POST['fecha-devolucion'] . ' ' . $_POST['hora-devolucion'];

            if (isset($_SESSION['id'])) {
                echo json_encode(['success' => true]);
            } else {
                $errores['mensaje'] = "Debe iniciar sesion para continuar.";
                echo json_encode($errores);
                die;
            }
        }
    }
}


