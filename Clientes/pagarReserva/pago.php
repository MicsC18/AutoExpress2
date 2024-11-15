<?php

session_start();

$dirbase = "/AutoExpress/Clientes";

if (!isset($_SESSION['id'])) {
    header("Location: $dirBase/paginaPrincipal/index.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoExpress</title>

    <!-- Bootstrap, Botstrap Icons  y CSS de la Navbar y el Footer-->
    <?php
    require(__DIR__ . "/../includes/head.php");
    ?>

    <!-- JavaScript -->
    <script defer src="pago.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="pago.css">
</head>


<body class="bg-light">

    <!-- Barra de Navegación -->
    <?php
    require(__DIR__ . "/../includes/menu.php");
    ?>

    <!-- Datos Personales -->
    <main id="main" class="my-5 mx-2 row align-items-center justify-content-center">
        <section class="col-12 col-lg-8">
            <div class="container rounded-2 p-3 container-datos-personales">
                <div class="row container-form">
                    <div class="col-12 container">
                        <form class="form form-group py-3 px-2 row" action="" method="" id="formulario">
                            <div class="row">
                                <div class="col-12 container container-title">
                                    <h1 class="text-start px-2">Datos personales</h1>
                                    <small class="text-dark px-2">Los campos marcados con asterisco (*) son
                                        obligatorios.</small>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="nombre">Nombre completo (*): </label>
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                    pattern="[A-Za-z ]{6,30}" placeholder="Juan Perez" required>
                                <p class="errorNombre text-danger"></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="correo">Correo (*): </label>
                                <input type="email" name="correo" id="correo" class="form-control"
                                    placeholder="juanperez@ejemplo.com" required>
                                <p class="errorCorreo text-danger"></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="cod-pais">C. País (*): </label>
                                <input type="text" name="cod-pais" id="cod-pais" max="2000" placeholder="+54"
                                    pattern="[0-9\-+]{1,6}" class="form-control" required>
                                <p class="errorCodPais text-danger"></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="celular">Celular (*): </label>
                                <input type="text" name="celular" id="celular" class="form-control"
                                    pattern="[0-9\-]{7,15}" placeholder="11-11111111" required>
                                <p class="errorCelular text-danger"></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="documento" class="mt-3">Documento (*): </label>
                                <select name="documento" id="documento" class="form-select" required>
                                    <option class="option-documento" value="" selected>(Seleccionar documento)</option>
                                    <option class="option-documento" value="dni">DNI</option>
                                    <option class="option-documento" value="pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="num-doc">Número de documento (*): </label>
                                <input type="text" name="num-doc" id="num-doc" class="form-control"
                                    placeholder="Seleccionar un documento" pattern="[A-Z0-9]{6,9}" required>
                                <p class="errorDocumento text-danger"></p>
                            </div>

                            <div class="col-12">
                                <label for="seguro">Elija un seguro (*): </label>
                                <select name="seguro" id="seguro" class="form-select" required>
                                    <option value="" class="option-seguro" selected>(Seleccionar seguro)</option>
                                    <option value="seguro-basico" class="option-seguro">Seguro Básico</option>
                                    <option value="seguro-premium" class="option-seguro">Seguro Premium</option>
                                </select>
                                <div class="mt-2">
                                    <p class="seguro-desc"></p>
                                    <small>Todos los autos cuentan con, al menos, un seguro de responsabilidad civil
                                        debido a que es obligatorio por ley (Ley N°24.449).</small>
                                </div>
                            </div>

                            <!-- Método de Pago -->
                            <div class="row pago">
                                <div class="col-12 container container-title">
                                    <h1 class="text-start px-2">Método de pago</h1>
                                    <small class="text-dark px-2">Los campos marcados con asterisco (*) son
                                        obligatorios.</small>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="medio-pago">Medio de pago (*): </label>
                                <select name="medio-pago" id="medio-pago" class="form-select" required>
                                    <option value="" class="option-pago" selected>(Seleccionar medio de pago)</option>
                                    <option value="efectivo" class="option-pago">Efectivo</option>
                                    <option value="transferencia" class="option-pago">Transferencia bancaria</option>
                                    <option value="tarjeta" class="option-pago">Tarjeta de crédito/débito</option>
                                </select>
                                <div class="mt-2">
                                    <p id="pago-texto" class="text-"></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 d-none" id="tarjeta">
                                <label for="tit-tarjeta">Titular de la tarjeta (*): </label>
                                <input type="text" name="tit-tarjeta" id="tit-tarjeta" class="form-control"
                                    pattern="[A-Za-z ]{6,30}" placeholder="Juan Perez" required>
                                <p class="errorTitular text-danger"></p>
                            </div>

                            <div class="col-md-6 col-12 d-none" id="tarjeta">
                                <label for="dni-titular">DNI del titular (*): </label>
                                <input type="text" name="dni-titular" id="dni-titular" class="form-control"
                                    pattern="[0-9]{6,9}" placeholder="11111111" required>
                                <p class="errorDNITitular text-danger"></p>
                            </div>

                            <div class="col-md-6 col-12 d-none" id="tarjeta">
                                <label for="num-tarjeta">Número de tarjeta (*): </label>
                                <input type="text" name="num-tarjeta" id="num-tarjeta" class="form-control"
                                    pattern="[0-9]{16,16}" placeholder="Ingrese los 16 dígitos de la tarjeta" required>
                                <p class="errorNumTarjeta text-danger"></p>
                            </div>

                            <div class="col-md-6 col-12 d-none" id="tarjeta">
                                <label for="vencimiento">Fecha de vencimiento (*): </label>
                                <input type="text" name="vencimiento" id="vencimiento" pattern="[0-9//]{5,5}"
                                    placeholder="xx/xxxx" class="form-control" required>
                                <p class="errorVencimiento text-danger"></p>
                            </div>

                            <div class="col-md-6 col-12 d-none" id="tarjeta">
                                <label for="cod-seguridad">Código de seguridad (*): </label>
                                <input type="text" name="cod-seguridad" id="cod-seguridad" pattern="[0-9]{3,3}"
                                    placeholder="xxx" class="form-control" required>
                                <p class="errorCodSeguridad text-danger"></p>
                            </div>

                            <!-- Enviar Formulario -->
                            <div class="col-12 mt-4 boton">
                                <input type="submit" value="Reservar" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <aside class="p-2 d-none d-lg-block col-4 align-self-start rounded-2 row">
            <div class="container container-head-resumen col-12">
                <h2 class="text-start">Resumen de la reserva</h2>
            </div>
            <div class="container container-body-resumen">
                <p>Acá irían todos los datos de la reserva (lugar de retiro, devolución, fecha y hora de ambas, auto
                    elegido, precio, etc) una vez esté el backend.</p>
            </div>
        </aside>
    </main>

    <!-- Footer -->
    <?php
    require(__DIR__ . "/../includes/footer.php");
    ?>
</body>