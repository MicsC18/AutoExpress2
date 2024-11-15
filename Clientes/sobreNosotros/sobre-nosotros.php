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
  <link rel="stylesheet" href="sobreNosotros.css">
</head>

<body>

  <!-- Barra de Navegación -->
  <?php
  require(__DIR__ . "/../includes/menu.php");
  ?>

  <!-- Sobre Nosotros -->
  <section class="seccion">
    <h1 class="display-3">Somos AutoExpress</h1>
    <div class="container-fluid cuerpo">

      <div class="row fila">
        <div class="col-12 col-lg-6 texto">
          <h2>Conocenos</h2>
          <p>
            En AutoExpress, entendemos que cada viaje es una experiencia única. Nos dedicamos a ofrecer soluciones de
            alquiler de vehículos que se adaptan a sus necesidades, ya sea para un viaje de negocios, una escapada
            familiar o una aventura por carretera. Con un enfoque en la calidad, el servicio y la sostenibilidad,
            nuestro compromiso es hacer que su experiencia de alquiler sea sencilla y placentera. A continuación, le
            invitamos a conocer más sobre nosotros y nuestra filosofía.
          </p>
        </div>
        <div class="col-12 col-lg-6">
          <img class="imagen" src="img/fondo/imagen-fondo-1.jpg" alt="Primera imagen decorativa">
        </div>
      </div>

      <div class="row fila">
        <div class="col-12 col-lg-6">
          <img class="imagen" src="img/fondo/imagen-fondo-2.jpg" alt="Segunda imagen decorativa">
        </div>
        <div class="col-12 col-lg-6 texto">
          <h2>Compromiso y Servicio</h2>
          <p>
            Somos más que una empresa de alquiler de vehículos; somos su compañero de viaje. Desde nuestra fundación,
            nuestro objetivo ha sido ofrecer experiencias de movilidad seguras y convenientes para todos nuestros
            clientes. Nuestro equipo apasionado trabaja incansablemente para brindarle un servicio excepcional, con una
            flota variada que se adapta a sus necesidades. Ya sea un viaje de negocios, unas vacaciones familiares o una
            escapada espontánea, estamos aquí para asegurar que su trayecto sea inolvidable.
          </p>
        </div>
      </div>

      <div class="row fila">
        <div class="col-12 col-lg-6 texto">
          <h2>Innovación y Sostenibilidad</h2>
          <p>
            Creemos en el poder de la movilidad sostenible. Bajo esa filosofía hemos estado a la vanguardia en la
            incorporación de vehículos ecológicos en nuestra flota, priorizando el bienestar del planeta y la comodidad
            de nuestros clientes. Nuestro compromiso con la innovación nos impulsa a ofrecer la mejor tecnología en
            nuestros vehículos, garantizando una experiencia de alquiler sencilla y eficiente. Únase a nosotros en este
            viaje hacia un futuro más limpio y verde.
          </p>
        </div>
        <div class="col-12 col-lg-6">
          <img class="imagen" src="img/fondo/imagen-fondo-3.jpg" alt="Tercera imagen decorativa">
        </div>
      </div>

      <div class="row fila">
        <div class="col-12 col-lg-6">
          <img class="imagen" src="img/fondo/imagen-fondo-4.jpg" alt="Cuarta imagen decorativa">
        </div>
        <div class="col-12 col-lg-6 texto">
          <h2>Pasión por los Viajes</h2>
          <p>
            Compartimos su pasión por los viajes. Estamos dedicados a proporcionar vehículos de alta calidad para que
            cada aventura sea posible. Nuestro equipo de entusiastas del turismo se esfuerza por ofrecer un servicio
            personalizado y consejos de viaje que le ayuden a descubrir nuevos destinos. Nos enorgullece atender a cada
            cliente con la atención y el cuidado que se merece, porque para nosotros, cada alquiler es una oportunidad
            para hacer que su experiencia de viaje sea excepcional.
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <?php
  require(__DIR__ . "/../includes/footer.php");
  ?>

</body>

</html>