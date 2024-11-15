<?php

session_start();

$dirbase = "/AutoExpress/Clientes";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "../includes/conectarDB.php";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = 'SELECT * FROM clientes WHERE email = :email';
        $resQuery = $conn->prepare($query);
        $resQuery->bindParam(':email', $_POST['email']);
        $resQuery->execute();

        if ($fila = $resQuery->fetch(PDO::FETCH_ASSOC)) {
            if(password_verify($_POST['password'], $fila['password'])){
                $_SESSION['id'] = $fila['id'];
                $_SESSION['username'] = $fila['username'];
                $_SESSION['nombre'] = $fila['nombre_completo'];
                echo '';
                die;
            }
            else{
                echo 'incorrecto';
                die;
            }

        } else {
            echo 'incorrecto';
            die;
        }
    } else {
        echo 'vacio';
        die;
    }
}
?>