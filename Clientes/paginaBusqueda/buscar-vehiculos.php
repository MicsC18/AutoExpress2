<?php

session_start();

if (isset($_SESSION['id'])) {
  $msg = 'Seleccioná ';
} else {
  $msg = 'Encontra ';
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

  <!-- CSS -->
  <link rel="stylesheet" href="buscar.css">

  <!-- JavaScript -->
  <script src="vehiculos.js" defer></script>
</head>

<body>

  <!-- Barra de Navegación -->
  <?php
  require(__DIR__ . "/../includes/menu.php");
  ?>

  <!-- Filtros -->
  <section>
    <h1><?= $msg ?> el vehículo que necesitás</h1>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container filtros">
        <h4>Filtros</h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filtrar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="filtrar">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <!-- Ordenar -->
            <li class="nav-item dropdown" id="ordenar">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown">
                Ordenar por
              </a>
              <ul class="dropdown-menu">
                <li><label class="form-label" for="menor"><input class="form-check-input" type="radio" name="ordenar"
                      id="menor"> Menor precio</label></li>
                <li><label class="form-label" for="mayor"><input class="form-check-input" type="radio" name="ordenar"
                      id="mayor"> Mayor precio</label></li>
              </ul>
            </li>

            <!-- Tipo de Vehículo -->
            <li class="nav-item dropdown" id="tipo-vehiculo">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown">
                Tipo de Vehículo
              </a>
              <ul class="dropdown-menu">
                <li><label class="form-label" for="SUV"><input class="form-check-input" type="radio" name="tipo"
                      id="SUV"> SUV</label></li>
                <li><label class="form-label" for="Intens"><input class="form-check-input" type="radio" name="tipo"
                      id="Intens"> Intens</label></li>
              </ul>
            </li>

            <!-- Plazas -->
            <li class="nav-item dropdown" id="plazas">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown">
                Plazas
              </a>
              <ul class="dropdown-menu">
                <li><label class="form-label" for="2"><input class="form-check-input" type="radio" name="plazas" id="2">
                    2+</label></li>
                <li><label class="form-label" for="4"><input class="form-check-input" type="radio" name="plazas" id="4">
                    4+</label></li>
                <li><label class="form-label" for="5"><input class="form-check-input" type="radio" name="plazas" id="5">
                    5+</label></li>
                <li><label class="form-label" for="7"><input class="form-check-input" type="radio" name="plazas" id="7">
                    7+</label></li>
              </ul>
            </li>

            <!-- Combustible -->
            <li class="nav-item dropdown" id="combustible">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown">
                Combustible
              </a>
              <ul class="dropdown-menu">
                <li><label class="form-label" for="diesel"><input class="form-check-input" type="radio"
                      name="combustible" id="diesel"> Diesel</label></li>
                <li><label class="form-label" for="electrico"><input class="form-check-input" type="radio"
                      name="combustible" id="electrico"> Eléctrico</label></li>
                <li><label class="form-label" for="gasoil"><input class="form-check-input" type="radio"
                      name="combustible" id="gasoil"> Gasoil</label></li>
              </ul>
            </li>

            <!-- Marca -->
            <li class="nav-item dropdown" id="marca">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown">
                Marca
              </a>
              <ul class="dropdown-menu marca">
                <li><label class="form-label" for="Renault"><input class="form-check-input" type="radio" name="marca"
                      id="Renault"> Renault</label></li>
                <li><label class="form-label" for="Toyota"><input class="form-check-input" type="radio" name="marca"
                      id="Toyota"> Toyota</label></li>
                <li><label class="form-label" for="Chevrolet"><input class="form-check-input" type="radio" name="marca"
                      id="Chevrolet"> Chevrolet</label></li>
                <li><label class="form-label" for="Ferrari"><input class="form-check-input" type="radio" name="marca"
                      id="Ferrari"> Ferrari</label></li>
                <li><label class="form-label" for="Honda"><input class="form-check-input" type="radio" name="marca"
                      id="Honda"> Honda</label></li>
              </ul>
            </li>

            <!-- Modelo -->
            <li class="nav-item dropdown" id="modelo">
              <a class="nav-link dropdown-toggle filtro" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Modelo
              </a>
              <ul class="dropdown-menu modelo">
                <li><label class="form-label" for="CR V"><input class="form-check-input" type="radio" name="modelo"
                      id="CR V"> CR V</label></li>
                <li><label class="form-label" for="Kwid"><input class="form-check-input" type="radio" name="modelo"
                      id="Kwid"> Kwid</label></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- Vehículos -->
  <section>
    <div class="container vehiculos">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
  require(__DIR__ . "/../includes/footer.php");
  ?>

</body>

</html>