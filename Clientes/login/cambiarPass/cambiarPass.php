<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar clave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Componentes/form.css">
    <link rel="icon" href="../Img/ico/logo-color.ico"><!--icono de la página-->
    <script defer src="verificarClave.js"></script><!--script para corroborar las regex-->
</head>

<body>
    <main id="main">
        <section class="section-container container d-flex justify-content-center align-items-center vh-100">
            <div class="container section-container w-100">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Nueva contraseña</h5>
                        <form action="" method="">
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña: </label>
                                <input type="password" class="form-control" id="password"
                                placeholder="Ingresa tu contraseña" name="password" required title="Tiene que tener 8 caracteres mínimo">
                                <p class="text-danger clave1-mal d-none"></p>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Reingrese su contraseña: </label>
                                <input type="password" class="form-control" id="password2"
                                placeholder="Ingresa tu contraseña" name="password" required
                                title="Tiene que tener 8 caracteres mínimo">
                                <p class="text-danger clave2-mal d-none"></p>
                            </div>
                            <div class="container">
                                <input type="submit" value="Iniciar Sesión" class="btn btn-primary w-100 enviar-btn"
                                    name="log">
                            </div>
                        </form>
                        <div class="text-center mt-2">
                            <p>¿No tienes una cuenta? <a href="../Register/register.html">Regístrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>