  <div class="d-flex justify-content-between align-items-center">
          <h3>Gestionar Modelos</h3>
          <button type="button" class="btn btn-outline-dark mb-3" data-bs-toggle="collapse" href="#Colapso" role="button" aria-expanded="false" aria-controls="Colapso">Agregar Modelo</button>
  </div>

  <div class="collapse" id="Colapso">
    <div class="card card-body">
        <form id="agregarModeloForm" method="POST" action="../../Controlador/GestionVehiculos/ModeloAgregar.php">
            <div class="mb-3">
              <label for="nombreModelo" class="form-label">Nombre del Modelo</label>
              <input type="text" class="form-control" id="nombreModelo" name="nombreModelo" placeholder="Introduce el modelo">
              <div class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
              <label for="MarcaModelo" class="form-label">Marca</label>
              <select name="MarcaModelo" id="MarcaModelo">
                  <?php 
                      foreach($marcas as $marca) {
                        echo '<option value="'.$marca["id_marca"].'">'.$marca["nombre"].'</option>';
                      } 
                  ?>
              </select>
              <div class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
                <label for="fabricacion" class="form-label">Año</label>
                <input type="number" class="form-control" id="fabricacion" name="fabricacion" placeholder="Introduce el año de fabricación"  max="2025">
                <div class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
                <label for="tipoVehiculo" class="form-label">Tipo de Vehículo</label>
                <input type="text" class="form-control" id="tipoVehiculo" name="tipoVehiculo" placeholder="Introduce el tipo"> 
                <div class="invalid-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary" id="btnAgregarModelo">Agregar Modelo</button>
        </form>
    </div>
  </div><br>
  
      <!-- Lista de modelos -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Fabricacion</th>
            <th>Tipo de Vehículo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
              require_once __DIR__.'../../Controlador/GestionVehiculos/mostrarModelo.php';
            ?>
        </tbody>
      </table>

      <!-- Modal Editar MODELO-->
      <div class="modal fade" id="ModeloEditar" tabindex="-1" aria-labelledby="ModeloModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> 
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModeloModalLabelModelo">Editar Modelo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editarModeloForm" method="POST" action="../../Controlador/GestionVehiculos/editarModelo.php">
               <input type="hidden" id="id_modelo" name="id_modelo" value="">  
               <div class="mb-3">
                  <label for="nombreModeloNuevo" class="form-label">Nombre del Modelo</label>
                  <input type="text" class="form-control" id="nombreModeloNuevo" name="nombreModeloNuevo" placeholder="Introduce el modelo" required>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="MarcaModelo" class="form-label">Marca</label>
                  <select name="MarcaModelo" id="MarcaModelo">
                      <?php 
                          foreach($marcas as $marca) {
                            echo '<option value="'.$marca["id_marca"].'">'.$marca["nombre"].'</option>';
                          } 
                      ?>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="FabricacionNuevo" class="form-label">Año</label>
                  <input type="number" class="form-control" id="FabricacionNuevo" name="FabricacionNuevo" placeholder="Introduce el año de fabricación" max="2025" required>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="tipoVehiculoNuevo" class="form-label">Tipo de Vehículo</label>
                  <input type="text" name="tipoVehiculoNuevo" id="tipoVehiculoNuevo">
                  <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-primary" id="BtnEditarModelo">Editar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CencelarEditarModelo">Cancelar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Eliminar MODELO-->
      <div class="modal fade" id="modalEliminarModelo" tabindex="-1" aria-labelledby="modalEliminarModeloLabel" aria-hidden="true" data-bs-backdrop="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalEliminarModeloLabel">Eliminar Modelo</h5> 
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="BodymodalEliminarModelo">
                      <div class="mb-3">
                        <h5>¿Está seguro que desea eliminar el modelo?</h5>
                      </div>
                      <form action="../../Controlador/GestionVehiculos/eliminarModelo.php" method="post">
                        <input type="hidden" id="id_modeloEliminar" name="id_modeloEliminar" value="">
                        
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnEliminarConfirmacionModelo">Sí, eliminar</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CancelarEliminacionModelo">Cancelar</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>


