<?php
//Si es la primer llamada
//O si es la llamada desde el boton submit

session_start();

$dirbase = "/AutoExpress/Clientes";

if (isset($_SESSION['id'])) {
    header("Location: $dirBase/paginaPrincipal/index.php");
    die;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Bootstrap, Botstrap Icons  y CSS de la Navbar y el Footer-->
    <?php
    require(__DIR__ . "/../includes/head.php");
    ?>

    <!-- JavaScript -->
    <script defer src="form.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <!-- Barra de Navegación -->
    <?php
    require(__DIR__ . "/../includes/menu.php");
    ?>

    <div class="container d-flex justify-content-center align-items-center mt-5">
        <section class="w-100 container section-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Registro de Cuenta</h5>

                    <div class="alert alert-danger d-none" id="alert"></div>

                    <form action="" method="POST" id="formulario">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" value="" class="form-control" id="username" placeholder="jperez1"
                                name="username" pattern="[a-zA-Z0-9._]{6,30}" required>
                            <p class="text-danger username-mal d-none"></p>
                        </div>
                        <div class="mb-3">
                            <label for="nombre">Nombre completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" pattern="[A-Za-z ]{6,30}"
                                placeholder="Juan Perez" required>
                            <p class="errorNombre text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="jperez@correo.com" required />
                            <p class="text-danger email-mal d-none"></p>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña"
                                name="password" required>
                            <p class="text-danger clave-mal d-none"></p>
                        </div>
                        <div class="boton">
                            <input type="submit" value="Registrarse" name="enviar" class="btn enviar-btn">
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>¿Ya tenés una cuenta? <a href="<?= $dirBase ?>/login/login.php">Iniciar sesión</a></p>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php
    require(__DIR__ . "/../includes/footer.php");
    ?>
</body>

</html>