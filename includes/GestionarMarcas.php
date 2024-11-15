<div class="d-flex justify-content-between align-items-center">
        <h3>Gestionar Marcas</h3>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#agregarMarcaModal">Agregar Marca</button>
      </div>
      
      <!-- Lista de marcas -->
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>Marca</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once __DIR__.'../../Controlador/GestionVehiculos/MostrarMarca.php';
          ?>
        </tbody>
      </table>

      <!-- Modal para agregar marca -->
      <div class="modal fade" id="agregarMarcaModal" tabindex="-1" aria-labelledby="agregarMarcaModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="agregarMarcaModalLabel">Agregar Marca</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" id="FormAgregarMarca" action="../../Controlador/GestionVehiculos/agregarMarca.php">
                          <div class="mb-3">
                              <label for="nombreMarca" class="form-label">Nombre de la Marca</label>
                              <input type="text" class="form-control" name="nombreMarca" id="nombreMarca" placeholder="Introduce la marca" required>
                              <div class="invalid-feedback"></div>
                          </div>
                          <button type="submit" id="btnAgregarMarca" class="btn btn-primary">Guardar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!------- Modal Editar Marca -----------------------------------------> 
      <div class="modal fade" id="editarMarcaModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editarModalLabel">Editar Marca</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="editarMarcaForm" method="post" action="../../Controlador/GestionVehiculos/EditarMarca.php">
                          <input type="hidden" id="idMarca" name="id_marca" value="">
                          <div class="mb-3">
                              <label for="nombreMarcaNueva" class="form-label">Nuevo Nombre de la Marca</label>
                              <input type="text" class="form-control" id="nombreMarcaNueva" name="nombreMarcaNueva" placeholder="Introduce el nuevo nombre" required>
                              <div class="invalid-feedback"></div>
                          </div>
                          <button type="submit" class="btn btn-primary" id="GuardarCambiosMarca">Guardar Cambios</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal Eliminar Marca-->
      <div class="modal fade" id="modalEliminarMarca" tabindex="-1" aria-labelledby="modalEliminarMarcaLabel" aria-hidden="true" data-bs-backdrop="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalEliminarMarcaLabel">Eliminar Marca</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="BodymodalEliminarMarca">
                      <div class="mb-3">
                          <h5>¿Está seguro que desea eliminar la marca?</h5>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <input type="hidden" id="idMarca" name="idMarca" value="">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CancelarEliminacionMarca">Cancelar</button>
                      <button type="button" class="btn btn-primary" id="btnEliminarConfirmacionMarca">Sí, eliminar</button>
                  </div>
              </div>
          </div>
      </div>
    </div>