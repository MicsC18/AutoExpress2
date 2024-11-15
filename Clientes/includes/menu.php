<?php
$dirbase = "/AutoExpress/Clientes";
?>

<!-- Barra de Navegación -->
<header>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid barra-nav">
            <a class="navbar-brand" href="<?= $dirBase ?>/paginaPrincipal/index.php">
                <img class="logo-nav" src="<?= $dirBase ?>/includes/logo/logo-no-background.png"
                    alt="Logo de AutoExpress">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-contenido">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-contenido">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $dirBase ?>/paginaPrincipal/index.php#reservas">Reservar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $dirBase ?>/paginaBusqueda/buscar-vehiculos.php">Vehículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $dirBase ?>/sobreNosotros/sobre-nosotros.php">Nuestra Empresa</a>
                    </li>
                    <?php
                    if (isset($_SESSION['id'])) {
                        require "menu_cliente.php";
                    } else {
                        require "menu_visitante.php";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>