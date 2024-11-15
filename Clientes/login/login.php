<?php
//Si es la primer llamada
//O si es la llamada desde el boton submit

session_start();

$dirbase = "/AutoExpress/Clientes";

if (isset($_SESSION['id']) && isset($_SESSION['id_sucursal_entrega'])) {
    header("Location: $dirBase/paginaBusqueda/buscar-vehiculos.php");
    die;
} else if (isset($_SESSION['id'])){
    header("Location: $dirBase/paginaPrincipal/index.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap, Botstrap Icons  y CSS de la Navbar y el Footer-->
    <?php
    require(__DIR__ . "/../includes/head.php");
    ?>

    <link rel="stylesheet" href="login.css">
    <script defer src="login.js"></script>
    <script defer src="recuPass.js"></script>
</head>

<body>
    <!-- Barra de Navegación -->
    <?php
    require(__DIR__ . "/../includes/menu.php");
    ?>

    <main id="main">
        <section class="section-container container d-flex justify-content-center align-items-center mt-5">
            <div class="container section-container w-100">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Iniciar Sesión</h5>

                        <div class="alert alert-danger d-none" role="alert" id="alert"></div>

                        <form action="" method="POST" id="formulario">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Ingresa tu email" required>
                                <p class="text-danger email-mal d-none"></p>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Ingresa tu contraseña" name="password" required>
                                <p class="text-danger clave-mal d-none"></p>
                            </div>
                            <div class="boton">
                                <input type="submit" value="Iniciar Sesión" class="btn iniciar-sesion">
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#recuperarClaveModal">¿Olvidaste tu
                                contraseña?</a>
                            <!--Se activa el modal-->
                        </div>
                        <div class="text-center mt-2">
                            <p>¿No tenés una cuenta? <a href="<?= $dirBase ?>/register/register.php">Registrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="recuperarClaveModal" tabindex="-1" aria-labelledby="labelRecuperarClave"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="labelRecuperarClave">¿Has olvidado tu contraseña?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="form-recup">
                            <label for="email-recup" class="mb-2 mt-3">Introduzca su correo para recuperarla </label>
                            <input type="email" id="email-recup" name="email-recup" required class="form-control">
                            <p class="text-danger errorEmail d-none"></p>
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn recup-contraseña">Recuperar contraseña</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
    require(__DIR__ . "/../includes/footer.php");
    ?>
</body>

</html>