<div class="container container-principal">
    <div class="col-sm-1 col-md-3 col-lg-8">

        <div class="row">
            <h1 class="center_title">Insumos</h1>
        </div>
        <div class="row">
            <div class="col-3 m-3">
                <button type="button" class="btn btn-dark">Agregar Insumo</button>
            </div>
            <div class="col-3 m-3">
                <button type="button" class="btn btn-dark">Editar Insumo</button>
            </div>
        </div>


        <div class="row">
            <!-- <div class="col-sm-1 col-md-2 col-lg-4 center_content">
            <form class="form needs-validation" id="forminsumos" novalidate>
                <div class="title">Registro<br><span>ingrese un insumo</span></div>
                <div>
                    <input type="text" placeholder="Nombre" name="nombre_insumo" id="nombre_insumo" class="input" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div>
                    <input type="text" placeholder="Descripcion" name="descripcion_insumo" id="descripcion_insumo" class="input" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div>
                    <input type="number" placeholder="Valor" name="valor_insumo" id="valor_insumo" class="input" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <button class="button-confirm" id="btn_agregarInsumo" type="submit" nombre="" descripcion="" valor="" >Registrar</button>
            </form>
        </div> -->


            <table class="table table-dark table-striped" id="table_insumos">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="contenedorInsumos">
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>john@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- The Modal -->
<div class="modal" id="EditarInsumo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Insumos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="needs-validation" id="formEditarInsumos" novalidate>
                    <div class="mb-3 mt-3">
                        <label for="edit-name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit-nombre" placeholder="Enter Nombre" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="edit-descripcion" class="form-label">Descripcion:</label>
                        <input type="text" class="form-control" id="edit-descripcion" placeholder="Enter Descripcion" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="edit-valor" class="form-label">Valor:</label>
                        <input type="number" class="form-control" id="edit-valor" placeholder="Enter Valor" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnEditarInsumo">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>