<br>
<div class="container">
    <form method="post" enctype="multipart/form-data" id="formCargaMasiva">
        <div class="row">
            <div class="col-lg-10">
                <input type="file" id="fileCargar" name="fileCargar" class="form-control" accept=".xls, .xlsx">
            </div>
            <div class="col-lg-2">
                <input type="submit" value="Cargar Datos  " class="btn btn-primary" id="btnCargaMasiva">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12" style="margin-left:40%;">
            <img id="imgCargando" src="vista/imagenes/loading.gif" alt="Cargando" style="display:none;">
        </div>
    </div>
</div>