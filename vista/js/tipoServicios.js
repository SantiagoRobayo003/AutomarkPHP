$(function () {
    
    var tablaTS = null;
    listarTiposServicios();
    

    var formsTipoServicio = document.querySelectorAll('#formTipoServicio')

    Array.prototype.slice.call(formsTipoServicio)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    form.classList.add('was-validated')
                } else {
                    event.preventDefault();
                    let tipoVehiculo = $("#tipo_servicio").val();

                    let objData = new FormData();
                    objData.append("tipo_servicio", tipoVehiculo);

                    fetch('control/controlTipoServicio.php', {
                        method: 'POST',
                        body: objData
                    }).then(response => response.json()).catch(error => {
                        console.error(error);
                    }).then(response => {
                        alert(response["mensaje"]);
                        listarTiposServicios();
                        $("#tipo_servicio").val("");
                    });
                }


            }, false)
        })

    function listarTiposServicios() {
        var objData = new FormData();
        objData.append("listarDatos", "ok");
        fetch('control/controlTipoServicio.php', {
            method: 'POST',
            body: objData
        }).then(response => response.json()).catch(error => {
            console.log(error);
        }).then(response => {
            cargarInsumos(response);
        });

        function cargarInsumos(response) {
            console.log(response);
            var dataSet = [];
            response.forEach(listarDatos);

            function listarDatos(item, index) {
                var objBotones = '<div>';
                objBotones += '<button id="btnEditar" type="button" class="btn btn-small btn-warning" tipo="' + item.idtipo_servicio + '"nombre="' + item.nombre_tipo_servicio + '" data-bs-toggle="modal" data-bs-target="#EditarTipoServicio"><i class="fa-solid fa-pen-to-square"></i></button>';
                objBotones += '<button id="btnEliminar" type="button" class="btn btn-small btn-danger" tipo="' + item.idtipo_servicio + '"><i class="fa-solid fa-trash"></i></button>';
                objBotones += '</div>';
                dataSet.push([item.idtipo_servicio, item.nombre_tipo_servicio, objBotones]);
            }

            if (tablaTS != null) {
                $("#table_tipoServicio").dataTable().fnDestroy();
            }

            tablaTS = $("#table_tipoServicio").DataTable({
                data: dataSet
            });
        }
    }

    $("#table_tipoServicio").on("click", "#btnEditar", function () {
        var idtipo_servicio = $(this).attr('tipo');
        var nombre = $(this).attr('nombre');

        $("#edit-nombre").val(nombre);
        $("#btnEditarTipoServicio").attr("tipo", idtipo_servicio);

    })

    var formularioEditarTV = document.querySelectorAll('#formEditarTipoServicio');

    // Bucle sobre ellos y evitar el envío
    Array.prototype.slice.call(formularioEditarTV)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    form.classList.add('was-validated')
                } else {
                    event.preventDefault();
                    var nombre = $("#edit-nombre").val();
                    var idtipo_servicio = $("#btnEditarTipoServicio").attr("tipo");

                    var objData = new FormData();
                    objData.append("editNombre", nombre);
                    objData.append("editId", idtipo_servicio);

                    fetch('control/controlTipoServicio.php', {
                        method: 'POST',
                        body: objData
                    }).then(response => response.json()).catch(error => {
                        console.log(error);
                    }).then(response => {
                        alert(response["mensaje"]);
                        $("#EditarTipoServicio").modal('toggle');
                        listarTiposServicios();
                    });
                }
            }, false)
        })

    $("#table_tipoServicio").on("click", "#btnEliminar", function () {
        var idtipo_servicio = $(this).attr('tipo');
        var objData = new FormData();
        objData.append("idEliminarTipo", idtipo_servicio);

        fetch('control/controlTipoServicio.php', {
            method: 'POST',
            body: objData
        }).then(response => response.json()).catch(error => {
            console.log(error);
        }).then(response => {
            alert(response["mensaje"]);
            listarTiposServicios();
        });
    })



})