<?php
session_start();
/*if(!isset($_SESSION['usuario'])){
    header('Location: ../../login/Log/login.html');
}*/
    require_once(__DIR__.'../../../Conexion/Conexion.php');

    $sql="SELECT * FROM roles WHERE nombre != 'cliente'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql="SELECT id_sucursal, nombre FROM sucursales";
    $stmt=$conn->prepare($sql);
    if ($stmt->execute()) {
        $sucursales = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($sucursales);
    } else {
        echo "Error en la consulta SQL: " . print_r($stmt->errorInfo(), true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sucursales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="indexGS.js"></script>
    <script defer src="javaGS.js"></script>
   
</head>

<body>
    <div class="container mt-5">

        <!-- Header -->
        <header class="bg-dark text-white py-4 mb-4">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="m-0">Gestión de Sucursales</h1>
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

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="#sucursales" data-bs-toggle="tab">Sucursales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#empleados" data-bs-toggle="tab">Empleados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#usuarios" data-bs-toggle="tab">Usuarios</a>
            </li>
        </ul><br>

        <!-- Mensajes de estado -->
        <?php if (isset($_SESSION['tipo_mensaje'])): ?>
            <div class="alert alert-<?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'success' : 'danger'; ?>" id="alert-mensaje">
                <strong><?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'Éxito!' : 'Error!'; ?></strong> <?php echo $_SESSION['mensaje']; ?>
            </div>
            <?php unset($_SESSION['tipo_mensaje'], $_SESSION['mensaje']); ?>
        <?php endif; ?>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="sucursales">

                <div class="table-responsive mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Provincia</th>
                                <th>Código Postal</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once __DIR__.'../../../Controlador/GestionSucursales/mostrarSucursales.php'; ?>
                        </tbody>
                    </table>
                </div>

                 <!-- Modal Asignar Empleado -->
                <div class="modal fade" id="AsignarEmpleadoModal" tabindex="-1" aria-labelledby="AsignarEmpleadoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EmpleadoModalLabel">Asignar Empleado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="AsignarEmpleadoForm" method="POST" action="../../Controlador/GestionSucursales/asignarEmpleado.php">
                                    <input type="hidden" id="idSucursal" name="idSucursal" value="">
                                    <div class="mb-3">
                                        <label for="Empleadonombre" class="form-label">Nombre del Empleado</label>
                                        <input type="text" class="form-control" id="Empleadonombre" name="Empleadonombre" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Empleadoclave" class="form-label">Clave</label>
                                        <input type="text" class="form-control" id="Empleadoclave" name="Empleadoclave" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="BtnAsiganrEmpleado">Asignar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CencelarAsignacion">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Modal Editar Sucursal -->
                <div class="modal fade" id="editarSucursalModal" tabindex="-1" aria-labelledby="editarSucursalModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarSucursalModalLabel">Editar Sucursal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editarSucursalForm" method="POST" action="#">
                                    <input type="hidden" id="idSucursal" name="idSucursal">
                                    <div class="mb-3">
                                        <label for="nombreSucursal" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombreSucursal" name="nombreSucursal" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="provinciaSucursal" class="form-label">Provincia</label>
                                        <input type="text" class="form-control" id="provinciaSucursal" name="provinciaSucursal" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="codigoPostalSucursal" class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" id="codigoPostalSucursal" name="codigoPostalSucursal" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ubicacionSucursal" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control" id="ubicacionSucursal" name="ubicacionSucursal" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btnGuardarEdicionSucursal">Guardar Cambios</button>
                                    <button type="button" class="btn btn-secondary" id="CancelarEdicionSucursal" data-bs-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modalEliminarSucursal" tabindex="-1" aria-labelledby="modalEliminarSucursalLabel" aria-hidden="true" data-bs-backdrop="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEliminarSucursalLabel">Eliminar Modelo</h5> 
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="BodymodalEliminarSucursal">
                                <div class="mb-3">
                                    <h5>¿Está seguro que desea eliminar la sucursal?</h5>
                                </div>
                                <form action="#" method="post">
                                    <input type="hidden" id="id_EliminarSucursal" name="id_EliminarSucursal" value="">
                                    
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btnEliminarConfirmacionSucursal">Sí, eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CancelarEliminacioSucursal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="empleados">
                
             <!-- Mensajes de estado -->
                <?php if (isset($_SESSION['tipo_mensaje'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'success' : 'danger'; ?>" id="alert-mensaje">
                        <strong><?php echo $_SESSION['tipo_mensaje'] === 'success' ? 'Éxito!' : 'Error!'; ?></strong> <?php echo $_SESSION['mensaje']; ?>
                    </div>
                    <?php unset($_SESSION['tipo_mensaje'], $_SESSION['mensaje']); ?>
                <?php endif; ?>

                <div class="table-responsive mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>id_sucursal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once __DIR__.'../../../Controlador/GestionSucursales/mostrarEmpleados.php'; ?>
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="tab-pane fade" id="usuarios"><br>
                

                <div class="table-responsive mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Usuario</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once __DIR__.'/../../Controlador/GestionSucursales/MostrarUsuarioSucursal.php'; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button"  data-bs-toggle='modal' data-bs-target='#AgregarUsuarioModal'>Agregar Usuario</button>
                </div>

                <!-- Agregar Usuario -->
                <div class="modal fade" id="AgregarUsuarioModal" tabindex="-1" aria-labelledby="AgregarUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="AgregarUsuarioLabel">
                                    <i class="bi bi-person-plus"></i> Asignar rol al Usuario
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                             <div class="modal-body">
                                <form id="AsignarRolUsuario" method="POST" action="../../Controlador/GestionSucursales/agregarUsuario.php">
                                    <div class="mb-3">
                                        <label for="NuevoRol" class="form-label">Seleccionar Rol</label>
                                        <select name="NuevoRol" id="NuevoRol" class="form-select" required>
                                            <option value="">Seleccione el rol a asignar.</option>
                                                <?php 
                                                    foreach($roles as $rol) {
                                                        echo '<option value="'.$rol["id"].'">'.$rol["nombre"].'</option>';
                                                    } 
                                                ?>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombreUsuario" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese el nombre del usuario" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="claveUsuario" class="form-label">Clave</label>
                                        <input type="text" class="form-control" id="claveUsuario" name="claveUsuario" placeholder="Ingrese la clave del usuario" required>
                                    </div>
                                    <div class="mb-3 d-none" id="divSucursalUsuario">
                                        <label for="SucursalUsuario" class="form-label">Sucursal</label>
                                        <select name="SucursalUsuario" id="SucursalUsuario" class="form-select">
                                            <option value="">Seleccione Sucursal</option>
                                                <?php 
                                                    if (isset($sucursales) && !empty($sucursales)) {
                                                        foreach ($sucursales as $sucursal) {
                                                            echo '<option value="'.$sucursal["id_sucursal"].'">'.$sucursal["nombre"].'</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">No hay sucursales disponibles</option>';
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success" id="AgregarUsuarioBTN">Asignar Rol</button>
                                        <button type="button" class="btn btn-outline-secondary" id="CancelarAgregarUsuarioBTN" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ReasignarRolModal" tabindex="-1" aria-labelledby="ReasignarRolModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="ReasignarRolModalLabel">
                                    <i class="bi bi-person-plus"></i> Asignar rol al Usuario
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                             <div class="modal-body">
                                <form id="ReasignarRolForm" method="POST" action="../../Controlador/GestionSucursales/.php">
                                    <div class="mb-3">
                                        <label for="NuevoRolUsuario" class="form-label">Seleccionar Rol</label>
                                        <select name="NuevoRolUsuario" id="NuevoRolUsuario" class="form-select" >
                                            <option value="">Seleccione el rol a asignar.</option>
                                                <?php 
                                                    foreach($roles as $rol) {
                                                        echo '<option value="'.$rol["id"].'">'.$rol["nombre"].'</option>';
                                                    } 
                                                ?>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                   
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success" id="ReasignarRolBTN">Guardar Rol</button>
                                        <button type="button" class="btn btn-outline-secondary" id="CancelarReasignarRolBTN" data-bs-dismiss="modal">Cancelar Operación</button>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Eliminar USUARIO-->
                <div class="modal fade" id="modalEliminarUsuario" tabindex="-1" aria-labelledby="modalEliminarUsuarioLabel" aria-hidden="true" data-bs-backdrop="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEliminarUsuarioLabel">Eliminar Modelo</h5> 
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="BodymodalEliminarModelo">
                                <div class="mb-3">
                                    <h5>¿Está seguro que desea eliminar el usuario?</h5>
                                </div>
                                <form action="../../Controlador/GestionSucursales/EliminarUsuario.php" method="post">
                                    <input type="hidden" id="id_EliminarUsuario" name="id_EliminarUsuario" value="">
                                    
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btnEliminarConfirmacionModelo">Sí, eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CancelarEliminacionModelo">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    

    </div>

</body>
</html>
