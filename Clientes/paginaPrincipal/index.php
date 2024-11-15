<?php

session_start();

if (isset($_SESSION['id'])) {
  $msg = '¡Bienvenido/a: ' . $_SESSION['nombre'] . '!';
} else {
  $msg = '¡Bienvenido/a!';
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
  <script defer src="reservas.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <!-- Barra de Navegación -->
  <?php
  require(__DIR__ . "/../includes/menu.php");
  ?>

  <!-- Presentación -->
  <section class="section" id="presentacion">

    <div class="container text-center mb-3" id="bienvenida">
      <h1 class="display-5"><?= $msg ?></h1>
    </div>
    <div class="container main">
      <div class="main-texto">
        <h1 class="display-4 titulo">Alquilá un vehículo adecuado a tus necesidades</h1>
        <p class="lead subtitulo">Encontrá las mejores ofertas y disfrutá de tu viaje de manera cómoda y segura.</p>
      </div>
    </div>
  </section>

  <!-- Nueva Reserva -->
  <section class="section" id="reservas">
    <div class="container reservas">
      <h1 class="display-6 titulo">Realizá tu Reserva</h1>
      <div class="container div-reserva">
        <div class="alert d-none" id="mensaje"></div>
        <form class="form form-group form-floating" action="" method="POST" id="formulario">
          <h4>Retiro</h4>
          <div class="row">
            <div class="mb-3 col-12">
              <label class="form-label" for="suc-retiro">Sucursal de retiro</label>
              <select class="form-select" name="suc-retiro" id="suc-retiro" required>
                <option value="">Seleccione la sucursal</option>
              </select>
              <div class="invalid-feedback" id="errorSucRetiro"></div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-12 col-md-6">
              <label class="form-label" for="fecha-retiro">Fecha de retiro</label>
              <input type="date" name="fecha-retiro" id="fecha-retiro" class="form-control" required>
              <div class="invalid-feedback" id="errorFechaRet"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
              <label class="form-label" for="hora-retiro">Hora de retiro</label>
              <select class="form-select" name="hora-retiro" id="hora-retiro" required>
                <option value="">--:--</option>
              </select>
              <div class="invalid-feedback" id="errorHoraRet"></div>
            </div>
          </div>

          <h4>Devolución</h4>
          <div class="row">
            <div class="mb-3 col-12">
              <label class="form-label" for="suc-devolucion">Sucursal de devolucion</label>
              <select class="form-select" name="suc-devolucion" id="suc-devolucion" required>
                <option value="">Seleccione la sucursal</option>
              </select>
              <div class="invalid-feedback" id="errorSucDevolucion"></div>
            </div>
          </div>
          <div class="row">
            <div class=" mb-3 col-12 col-md-6">
              <label class="form-label" for="fecha-devolucion">Fecha de devolucion</label>
              <input type="date" name="fecha-devolucion" id="fecha-devolucion" class="form-control" required>
              <div class="invalid-feedback" id="errorFechaDev"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
              <label class="form-label" for="hora-devolucion">Hora de devolucion</label>
              <select class="form-select" name="hora-devolucion" id="hora-devolucion" required>
                <option value="">--:--</option>
              </select>
              <div class="invalid-feedback" id="errorHoraDev"></div>
            </div>
          </div>
          <div class="boton">
            <input type="submit" value="Ver vehículos" class="enviar-reserva btn">
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Vehículos -->
  <section class="section" id="vehiculos">
    <h1 class="display-6 titulo">Nuestros vehículos</h1>

    <div id="carousel-autos" class="carousel slide">
      <div class="carousel-indicators" data-bs-wrap="true">
        <button type="button" data-bs-target="#carousel-autos" data-bs-slide-to="0" class="active">
          <img src="Img/autos/FIORINO.png" />
        </button>
        <button type="button" data-bs-target="#carousel-autos" data-bs-slide-to="1">
          <img src="Img/autos/CAMRY.png" />
        </button>
        <button type="button" data-bs-target="#carousel-autos" data-bs-slide-to="2">
          <img src="Img/autos/ONIX.png" />
        </button>
        <button type="button" data-bs-target="#carousel-autos" data-bs-slide-to="3">
          <img src="Img/autos/VAN.png" />
        </button>
        <button type="button" data-bs-target="#carousel-autos" data-bs-slide-to="4">
          <img src="Img/autos/KICKS.png" />
        </button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Img/autos/FIORINO.png" class="img-carousel" alt="Categoía utilitaros">
          <div class="carousel-caption d-md-block">
            <h5>Utilitarios</h5>
            <p>Vehículos compactos y versátiles, con buena capacidad de carga para una familia mediana.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Img/autos/CAMRY.png" class="img-carousel" alt="Categoría sedanes">
          <div class="carousel-caption d-md-block">
            <h5>Sedanes</h5>
            <p>Autos de cuatro puertas, cómodos y elegantes, ideales para el uso familiar y trayectos urbanos.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Img/autos/ONIX.png" class="img-carousel" alt="Categoría hatchback">
          <div class="carousel-caption d-md-block">
            <h5>Hatchback</h5>
            <p>Autos compactos con una puerta trasera que da acceso directo al maletero, combinan practicidad con diseño
              urbano.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Img/autos/VAN.png" class="img-carousel" alt="Categoría van">
          <div class="carousel-caption d-md-block">
            <h5>Van</h5>
            <p>Vehículos espaciosos con capacidad para transportar a varios pasajeros, perfectos para grandes familias.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Img/autos/KICKS.png" class="img-carousel suv" alt="Categoría SUV">
          <div class="carousel-caption d-md-block">
            <h5>SUV</h5>
            <p>Vehículos robustos y espaciosos con capacidad todoterreno, combinan confort y versatilidad para ciudad y
              aventura.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-autos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel-autos" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
  </section>
  
  
    <!-- Footer -->
  <?php
  require(__DIR__ . "/../includes/footer.php");
  ?>
</body>

</html>