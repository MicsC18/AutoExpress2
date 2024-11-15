<?php
  session_start();

 /*if(!isset($_SESSION['usuario'])){
    header('Location: ../../login/Log/login.html');
  }*/


  include_once('../../Conexion/Conexion.php');
  $sql = "SELECT id_marca, nombre FROM marcas";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="validacionesGV.js"></script>
    <link rel="stylesheet" href="indexGV.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="AjaxMarca.js"></script>
    <script defer src="AjaxModelo.js"></script>
</head>

<body>
<div class="container mt-5">

  <!-- Header -->
  <header class="bg-dark text-white py-4 mb-4">
      <div class="container d-flex justify-content-between align-items-center">
          <h1 class="text-center flex-grow-1 m-0 text-lg-start">Gestión de Vehículos</h1>
          <!-- Perfil -->
          <div class="dropdown">
              <a class="btn btn-outline-light dropdown-toggle d-flex align-items-center" href="#" role="button" id="perfilDropdown" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle me-2"></i> Perfil
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                  <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#">Cerrar Sesión</a></li>
              </ul>
          </div>
      </div>
  </header>

  <!-- Tabs for Marcas, Modelos, Unidades -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="marcas-tab" data-bs-toggle="tab" data-bs-target="#marcas" type="button" role="tab" aria-controls="marcas" aria-selected="true">Gestionar Marcas</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="modelos-tab" data-bs-toggle="tab" data-bs-target="#modelos" type="button" role="tab" aria-controls="modelos" aria-selected="false">Gestionar Modelos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="unidades-tab" data-bs-toggle="tab" data-bs-target="#unidades" type="button" role="tab" aria-controls="unidades" aria-selected="false">Gestionar Unidades</button>
      </li>
  </ul>
  
  <!-- Tab Content -->
  <div class="tab-content mt-4" id="myTabContent">
    <!-- Gestionar Marcas -->
    <div class="tab-pane fade show active" id="marcas" role="tabpanel" aria-labelledby="marcas-tab">
      <?php if (isset($_SESSION['tipo_mensaje'])): ?>
        <div class="alert alert-<?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'success' : 'danger'; ?>" id="alert-mensaje">
            <strong><?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'Éxito!' : 'Error!'; ?></strong> <?php echo $_SESSION['mensaje']; ?>
        </div>
        <?php unset($_SESSION['tipo_mensaje'], $_SESSION['mensaje']); ?>
      <?php endif; ?>
      
      <?php require_once __DIR__ . '/../../includes/GestionarMarcas.php'; ?>
    </div>
    
    <!-- Gestionar Modelos -->
    <div class="tab-pane fade" id="modelos" role="tabpanel" aria-labelledby="modelos-tab">
      <?php if (isset($_SESSION['tipo_mensaje'])): ?>
        <div class="alert alert-<?php echo $_SESSION['tipo_mensaje'] === 'warning' ? 'warning' : 'danger'; ?>" id="alert-mensaje-modelo">
            <strong><?php echo $_SESSION['tipo_mensaje'] === 'warning' ? 'Lo sentimos!' : 'Error!'; ?></strong> <?php echo $_SESSION['mensaje']; ?>
        </div>
        <?php unset($_SESSION['tipo_mensaje'], $_SESSION['mensaje']); ?>
      <?php endif; ?>
      
      <?php require_once __DIR__ . '/../../includes/GestionarModelos.php'; ?>  
    </div>

    <!-- Gestionar Unidades -->
    <div class="tab-pane fade" id="unidades" role="tabpanel" aria-labelledby="unidades-tab">
      <?php if (isset($_SESSION['tipo_mensaje']) && $_SESSION['tipo_mensaje'] === 'error'): ?>
        <div class="alert alert-danger" id="alert-error">
            <strong>Error!</strong> <?php echo $_SESSION['mensaje']; ?>
        </div>
        <?php unset($_SESSION['tipo_mensaje'], $_SESSION['mensaje']); ?>
      <?php endif; ?>

      <?php require __DIR__ . '/../../includes/GestionarUnidades.php'; ?>

    </div>
  </div>

</div>
</body>
</html>
