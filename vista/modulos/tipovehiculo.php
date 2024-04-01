<h1 class="center_title">Tipo Vehiculo</h1>
<div class="container-fluid ">
    <div class="row">
        <div class="col-sm-1 col-md-2 col-lg-4 center_content">
            <form class="form needs-validation" id="formTipoVehiculo" novalidate>
                <div class="title">Registro<br><span>ingrese el tipo de Vehiculo</span></div>
                <div>
                    <input type="text" placeholder="tipo de vehiculo" name="tipo_vehiculo" id="tipo_vehiculo" class="input" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <button class="button-confirm" type="submit">Registrar</button>
            </form>
        </div>

        <div class="col-sm-1 col-md-3 col-lg-8">
            <table class="table table-dark table-striped" id="table_tipoVehiculo">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type Car</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="EditarTipoVehiculo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Insumos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="needs-validation" id="formEditarTipoVehiculo" novalidate>
                    <div class="mb-3 mt-3">
                        <label for="edit-nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit-nombre" placeholder="Enter Descripcion" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnEditarTipoVehiculo">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>