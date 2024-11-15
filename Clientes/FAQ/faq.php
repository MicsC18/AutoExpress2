<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas frecuentes</title>

    <!-- Bootstrap, Botstrap Icons  y CSS de la Navbar y el Footer-->
    <?php
    require(__DIR__ . "/../includes/head.php");
    ?>

    <!-- JavaScript -->
    <script defer src="despliegueDescripcion.js"></script>
    <script defer src="buscador.js"></script>
    <script defer src="https://kit.fontawesome.com/c567d0d966.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <!-- Barra de Navegación -->
    <?php
    require(__DIR__ . "/../includes/menu.php");
    ?>

    <main id="main">
        <section class="section-container container d-flex justify-content-center align-items-center flex-column">
            <div class="buscador-container d-flex flex-column justify-content-center align-items-center">
                <div class="title mt-5">
                    <h1 class="mt-2">Preguntas frecuentes</h1>
                </div>
                <div class="buscador mt-4 d-flex justify-content-between p-2 border rounded-2 align-items-center w-100">
                    <input type="text" name="" id="" class="w-100 border-0 buscador-palabras"
                        placeholder="Buscar por palabra clave">
                    <i class="fa-solid fa-magnifying-glass lupa-buscador p-2"></i>
                </div>
            </div>
            <div class="container my-5 contenedor-faq row rounded-2 gap-3 gap-md-1">
                <div class="mt-1 d-none contenedor-resultados-encontrados">
                    <p class="fs-5 resultados-encontrados-p"></p>
                </div>
                <div
                    class="faq col-12 rounded-2 border d-flex gap-2 justify-content-start justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Cómo puedo reservar un automóvil?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Para realizar una reservación, los pasos son los siguientes:
                        <ul>
                            <li>Acceda a la página principal de nuestra plataforma <a href="<?=$dirBase?>/paginaPrincipal/index.php#reservas">clickeando
                                    aquí</a>.</li>
                            <li>Ingrese la fecha y hora de inicio de la reserva, así como la fecha y hora de devolución
                                del vehículo.</li>
                            <li>Seleccione el vehículo de su preferencia entre las opciones disponibles.</li>
                            <li>Elija el método de pago que más le convenga.</li>
                            <li>Confirme su reservación para finalizar el proceso.</li>
                        </ul>

                        Una vez completados estos pasos, recibirá una confirmación de su reserva por correo electrónico.
                        </p>
                    </div>
                </div>
                <div
                    class="faq col-12 rounded-2 border d-flex gap-2 justify-content-start justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Puedo modificar o cancelar mi reserva?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Si, es posible modificar o cancelar la reserva. Contamos con una
                            página para realizar estas acciones.</p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Necesito hacer un depósito para reservar un automóvil?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Para reservar un vehículo, se pide un anticipo que varía según la
                            categoría de auto y dias de alquiler elegidos por el cliente.</p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Puedo reservar un automóvil por teléfono o solo en línea?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">No. Por el momento, solo se pueden reservar unidades desde la
                            plataforma web siguiendo los pasos mencionados en una de las secciones anteriores.</p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Debo tener una licencia de conducir internacional?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Si tienes una licencia de conducir internacional a diferencia de una
                            nacional, no hay problema. Cualquiera de las dos opciones es válida.</p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Qué tipo de seguro está incluido en el alquiler?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">En todos los vehiculos, sin excepción, está incluido un seguro de
                            "responsabilidad civil". Sin embargo, a la hora de hacer una reserva, el cliente puede
                            elegir entre esta opción u otra llamada <b>seguro premium</b> (con costo adicional) que le
                            permite tener más seguridad ante cualquier imprevisto.
                            <br><br>
                            Para tener más información sobre los seguros, puede verlos antes de realizar una reserva, en
                            el apartado de <b>métodos de pago</b>, sin necesidad de ingresar ningún dato personal.
                        </p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Necesito una tarjeta de crédito para alquilar un automóvil?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">No necesariamente. Las formas de pago van desde tarjetas de crédito,
                            débito o transferencia bancaria ya sea en moneda nacional o dólares estadounidenses (USD) al
                            tipo de cambio oficial.
                            <br>
                            Por el momento, no aceptamos ningún tipo de transferencia con criptomonedas.
                        </p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Qué tipo de automóvil están disponibles para alquilar?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Tenemos una gama amplia de vehículos para elegir, ajustándonos a las
                            necesidades de nuestros clientes. Si le interesa saber más, haga <a
                                href="<?= $dirBase ?>/paginaBusqueda/buscar-vehiculos.php">click aquí</a> para ver las unidades que le ofrecemos.</p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Puedo elegir el tamaño o tipo de vehiculo al hacer la reserva?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Antes de realizar una reserva, al momento de elegir una unidad, es
                            posible filtrarlas por:
                        <ul>
                            <li>Tipo de auto</li>
                            <li>Cantidad de plazas</li>
                            <li>Tipo de combustible</li>
                            <li>Modelo</li>
                            <li>Marca</li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Los precios incluyen impuestos y otros cargos?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Si, los precios incluyen impuestos a la hora confirmar la reserva.
                        </p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Puedo conducir fuera del país con el automóvil alquilado?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">Esto va a depender del tipo de seguro que elijas, ya que con el
                            seguro que viene por defecto el vehículo, no existe tal posibilidad.
                            <br>
                            En cambio, si optas por un seguro mas robusto ante cualquier situación, esto puede
                            realizarse si problemas. Siempre tratamos de que nuestro clientes viajen con la seguridad de
                            no tener que pagar un monto muy alto ante un imprevisto.
                        </p>
                    </div>
                </div>
                <div
                    class="faq rounded-2 col-12  border d-flex gap-2 justify-content-around justify-content-md-start flex-column p-3">
                    <div
                        class="contenedor-pregunta d-flex justify-content-center justify-content-md-start align-items-center">
                        <div class="contenedor-container-pregunta d-flex gap-2 align-items-center">
                            <p class="pregunta m-0">¿Puedo conducir fuera del país con el automóvil alquilado?</p>
                            <i
                                class="fa-solid fa-caret-down"></i><!--Alterno entre caret-down y caret-up segun se haya clickeado-->
                        </div>
                    </div>
                    <div class="desc-pregunta mt-3 d-none">
                        <p class="desc-pregunta-p">En ese caso, se aplicará una tarifa adicional ya que desde un
                            principio se acuerda que el vehiculo se entregue en fecha y forma.
                            <br>
                            La tarifa varía según el tipo de vehículo elegido y/o los dias que el cliente se atrase con
                            la devolución.
                        </p>
                    </div>
                </div>
        </section>
    </main>

    <!-- Footer -->
    <?php
    require(__DIR__ . "/../includes/footer.php");
    ?>

</body>

</html>