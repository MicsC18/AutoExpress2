<?php
//Si es la primer llamada
//O si es la llamada desde el boton submit

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "../includes/conectarDB.php";

    if (!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $query = "SELECT * FROM clientes WHERE username = :username";
        $resQuery = $conn->prepare($query);
        $resQuery->bindParam(':username', $_POST['username']);
        $resQuery->execute();

        if ($filas = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
            echo "usuarioError";
            die;
        } else {
            $query = "SELECT * FROM clientes WHERE email = :email";
            $resQuery = $conn->prepare($query);
            $resQuery->bindParam(':email', $_POST['email']);
            $resQuery->execute();

            if ($filas = $resQuery->fetchAll(PDO::FETCH_ASSOC)) {
                echo "emailError";
                die;
            } else {
                $passwHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $query = "INSERT INTO clientes (username, nombre_completo, email, password) VALUES (:username, :nombre_completo, :email, :password)";
                $resQuery = $conn->prepare($query);
                $resQuery->bindParam(':username', $_POST['username']);
                $resQuery->bindParam(':nombre_completo', $_POST['nombre']);
                $resQuery->bindParam(':email', $_POST['email']);
                $resQuery->bindParam(':password', $passwHash);
                $resQuery->execute();
                $id = $conn->lastInsertId();

                if(!empty($id)){
                    $query = "SELECT * FROM clientes WHERE id = :id";
                    $resQuery = $conn->prepare($query);
                    $resQuery->bindParam(':id', $id);
                    $resQuery->execute();

                    if($fila = $resQuery->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $fila['username'];
                        $_SESSION['nombre'] = $fila['nombre_completo'];

                        echo 'success';
                        die;
                    }
                }
            }
        }
    } else {
        echo 'camposVacios';
        die;
    }
}

?>
