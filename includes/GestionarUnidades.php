<div class="d-flex justify-content-between align-items-center">
            <h3>Gestionar Unidades</h3>
            <button type="button" class="btn btn-outline-dark mb-3"data-bs-toggle="collapse" href="#ColapsoAgregarUnidad" role="button" aria-expanded="false" aria-controls="ColapsoAgregarUnidad">Agregar Unidad</button>
        </div>

            <div class="collapse" id="ColapsoAgregarUnidad">
              <div class="card card-body">
                <form id="agregarUnidadForm" method="post" action="../../Controlador/GestionVehiculos/agregarUnidad.php">   
                  
                  <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Introduce el color" required>
                    <div class="invalid-feedback"></div>
                  </div>
                
                  <div class="mb-3">
                    <label for="puertas" class="form-label">Número de Puertas</label>
                    <input type="number" class="form-control" id="puertas" name="puertas" placeholder="Introduce el número de puertas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <!-- Aire Acondicionado -->
                  <div class="mb-3">
                    <label for="aireAcondicionado" class="form-label">Aire Acondicionado</label>
                    <select class="form-select" id="aireAcondicionado" name="aireAcondicionado" required>
                      <option value="" >Selecciona una opción</option>
                      <option value="1">Sí</option>
                      <option value="0">No</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <!-- Transmisión -->
                  <div class="mb-3">
                    <label for="transmision" class="form-label">Transmisión</label>
                    <select class="form-select" id="transmision" name="transmision" required>
                      <option value="" >Selecciona una transmisión</option>
                      <option value="Automática">Automática</option>
                      <option value="Manual">Manual</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="mb-3">
                    <label for="combustible" class="form-label">Tipo de Combustible</label>
                    <select class="form-select" id="combustible" name="combustible" required>
                      <option value="" >Selecciona el tipo de combustible</option>
                      <option value="Gasolina">Gasolina</option>
                      <option value="Diésel">Diésel</option>
                      <option value="Eléctrico">Eléctrico</option>
                      <option value="Híbrido">Híbrido</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                   <!-- Capacidad de Personas -->
                   <div class="mb-3">
                    <label for="cantidadPersonas" class="form-label">Capacidad de Personas</label>
                    <input type="number" class="form-control" id="cantidadPersonas" name="cantidadPersonas" placeholder="Número de personas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <!-- Capacidad de Maletas -->
                  <div class="mb-3">
                    <label for="cantidadMaletas" class="form-label">Capacidad de Maletas</label>
                    <input type="number" class="form-control" id="cantidadMaletas" name="cantidadMaletas" placeholder="Número de maletas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <!-- Imagen URL -->
                  <div class="mb-3">
                    <label for="imagenUrl" class="form-label">URL de la Imagen</label>
                    <input type="url" class="form-control" id="imagenUrl" name="imagenUrl" placeholder="URL de la imagen del vehículo" required>
                    <div class="invalid-feedback"></div>
                  </div>
                  
                  <div class="mb-3">
                     <label for="marcaUnidad">Selecione la Marca de la Unidad:</label>
                     <select name="marcaUnidad" class="form-select" id="marcaUnidad">
                      <option value="">Seleccione una marca</option>
                      <?php 
                            foreach($marcas as $marca) {
                              echo '<option value="'.$marca["id_marca"].'">'.$marca["nombre"].'</option>';
                            } 
                        ?>
                     </select>
                     <div class="invalid-feedback"></div>
                   </div>

                  <div class="mb-3">
                     <label for="modeloUnidad">Selecione el Modelo de la Unidad:</label>
                     <select name="modeloUnidad" class="form-select" id="modeloUnidad"  disabled>
                        <option value="">Seleccione primero una Marca</option>
                    </select>
                     <div class="invalid-feedback"></div>
                    </div>

                  <!-- Disponibilidad -->
                  <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad</label>
                    <select class="form-select" id="disponibilidad" name="disponibilidad" required>
                      <option value="" selected>Selecciona una opción</option>
                      <option value="1">Disponible</option>
                      <option value="0">No Disponible</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <!-- Botón de Envío -->
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="btnAgregarUnidad">Agregar Unidad</button>
                  </div>
                </form>
              </div>
            </div><br>
     
          <!-- Lista de unidades -->
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>color</th>
                  <th>puertas</th>
                  <th>aire_acondicionado</th>
                  <th>transmision</th>
                  <th>Combustible</th>
                  <th>personas</th>
                  <th>maletas</th>
                  <th>imagen</th>
                  <th>modelo</th>
                  <th>marca</th>
                  <th>disponibilidad</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <?php require_once __DIR__.'../../Controlador/GestionVehiculos/mostrarUnidades.php'; ?>
              
              </tr>
          </tbody>
      </table>

      <div class="d-grid">
          <button type="button" class="btn btn-outline-dark mb-3" data-bs-toggle="collapse" href="#ColapsoUnidad" role="button" aria-expanded="false" aria-controls="ColapsoUnidad">Gestionar MTM</button>
      </div>

      <div class="collapse" id="ColapsoUnidad">
        <div class="card card-body">
          <form id="FormUnidadMTM" method="post" action="#">
          <div class="mb-3">
            <label for="unidad" class="form-label">Unidad</label>
            <select class="form-select" id="unidad" name="unidad" required>
              <option value="">Seleccione una Unidad</option>
              <option value="Unidad 1">Unidad 1</option>
              <option value="Unidad 2">Unidad 2</option>
            </select>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
            <label for="problemaUnidad" class="form-label">Problema de la Unidad</label>
            <textarea class="form-control" id="problemaUnidad" name="problemaUnidad" rows="4" placeholder="Describa el problema de la unidad" required></textarea>
            <div class="invalid-feedback"></div>
          </div>
      
          <!-- Fecha de Baja de la Unidad -->
          <div class="mb-3">
            <label for="fechaBaja" class="form-label">Fecha de Baja</label>
            <input type="date" class="form-control" id="fechaBaja" name="fechaBaja" required>
            <div class="invalid-feedback"></div>
          </div>
      
          <!-- Fecha de Alta de la Unidad -->
          <div class="mb-3">
            <label for="InputfechaAlta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="InputfechaAlta" name="InputfechaAlta" required>
            <div class="invalid-feedback"></div>
          </div>
      
          <!-- Botones de acción -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary" id="btnGuardarMTM">Guardar</button>
          </div>
                
          </form>
        </div>
      </div><br>


           
<!------------------ Modal Editar Unidad --------------------------------------------------------------->
    <div class="modal fade" id="modalEditarUnidad" tabindex="-1" aria-labelledby="modalEditarUnidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditarUnidadLabel">Editar Unidad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editarUnidadForm">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="colorEditar" class="form-label">Color</label>
                    <input type="text" class="form-control" id="colorEditar" name="colorEditar" placeholder="Introduce el color" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="puertasEditar" class="form-label">Número de Puertas</label>
                    <input type="number" class="form-control" id="puertasEditar" name="puertasEditar" placeholder="Introduce el número de puertas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="aireAcondicionadoEditar" class="form-label">Aire Acondicionado</label>
                    <select class="form-select" id="aireAcondicionadoEditar" name="aireAcondicionadoEditar" required>
                      <option value="">Selecciona una opción</option>
                      <option value="1">Sí</option>
                      <option value="0">No</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="transmisionEditar" class="form-label">Transmisión</label>
                    <select class="form-select" id="transmisionEditar" name="transmisionEditar" required>
                      <option value="">Selecciona una transmisión</option>
                      <option value="Automática">Automática</option>
                      <option value="Manual">Manual</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="combustibleEditar" class="form-label">Tipo de Combustible</label>
                    <select class="form-select" id="combustibleEditar" name="combustibleEditar" required>
                      <option value="">Selecciona el tipo de combustible</option>
                      <option value="Gasolina">Gasolina</option>
                      <option value="Diésel">Diésel</option>
                      <option value="Eléctrico">Eléctrico</option>
                      <option value="Híbrido">Híbrido</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="cantidadPersonasEditar" class="form-label">Capacidad de Personas</label>
                    <input type="number" class="form-control" id="cantidadPersonasEditar" name="cantidadPersonasEditar" placeholder="Número de personas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="cantidadMaletasEditar" class="form-label">Capacidad de Maletas</label>
                    <input type="number" class="form-control" id="cantidadMaletasEditar" name="cantidadMaletasEditar" placeholder="Número de maletas" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="imagenUrlEditar" class="form-label">URL de la Imagen</label>
                    <input type="url" class="form-control" id="imagenUrlEditar" name="imagenUrlEditar" placeholder="URL de la imagen del vehículo" required>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="marcaUnidadEditar">Seleccione la Marca de la Unidad</label>
                    <select name="marcaUnidadEditar" class="form-select" id="marcaUnidadEditar" required>
                      <option value="">Seleccione una marca</option>
                      <?php 
                        foreach($marcas as $marca) {
                          echo '<option value="'.$marca["id_marca"].'">'.$marca["nombre"].'</option>';
                        } 
                      ?>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="modeloUnidadEditar">Seleccione el Modelo de la Unidad</label>
                    <select name="modeloUnidadEditar" class="form-select" id="modeloUnidadEditar" disabled>
                      <option value="">Seleccione primero una Marca</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="disponibilidadEditar" class="form-label">Disponibilidad</label>
                    <select class="form-select" id="disponibilidadEditar" name="disponibilidadEditar" required>
                      <option value="">Selecciona una opción</option>
                      <option value="1">Disponible</option>
                      <option value="0">No Disponible</option>
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="BtnEditarUnidadForm" class="btn btn-primary">Editar unidad</button>
                  </div>
                </div>
              </form>
            </div>
           
          </div>
        </div>
    </div>

<!-- Modal ELIMINAR UNIDAD -->
    <div class="modal fade" id="EliminarUnidadModal" tabindex="-1" aria-labelledby="modalUnidadEliminarLabel" aria-hidden="true" data-bs-backdrop="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="EliminarUnidadLabel">Eliminar Unidad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="BodyEliminarUnidad">
              <label for="">¿Está seguro que desea eliminar la unidad?</label>
            </div>
            <div class="modal-footer">
                <form action="../../Controlador/GestionVehiculos/eliminarUnidad.php" method="post">
                 <input type="hidden" id="idUnidad" name="idUnidad" value="">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary" id="btnEliminarUnidadConfirmacion">Guardar cambios</button>
                </form>
            </div>
          </div>
        </div>
    </div>

