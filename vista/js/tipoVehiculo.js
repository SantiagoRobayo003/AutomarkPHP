$(function () {

  var tablaTV = null;
  listarTiposVehiculos();

  var formsTipoVehiculo = document.querySelectorAll('#formTipoVehiculo')

  Array.prototype.slice.call(formsTipoVehiculo)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
          form.classList.add('was-validated')
        } else {
          event.preventDefault();
          let tipoVehiculo = $("#tipo_vehiculo").val();

          let objData = new FormData();
          objData.append("tipo_vehiculo", tipoVehiculo);

          fetch('control/controlTipoVehiculo.php', {
            method: 'POST',
            body: objData
          }).then(response => response.json()).catch(error => {
            console.error(error);
          }).then(response => {
            alert(response["mensaje"]);
            listarTiposVehiculos();
            $("#tipo_vehiculo").val("");
          });
        }


      }, false)
    })

  function listarTiposVehiculos() {
    var objData = new FormData();
    objData.append("listarDatos", "ok");
    fetch('control/controlTipoVehiculo.php', {
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
        objBotones += '<button id="btnEditar" type="button" class="btn btn-small btn-warning" tipo="' + item.idtipo_vehiculo + '"nombre="' + item.nombre_tipo_vehiculo + '" data-bs-toggle="modal" data-bs-target="#EditarTipoVehiculo"><i class="fa-solid fa-pen-to-square"></i></button>';
        objBotones += '<button id="btnEliminar" type="button" class="btn btn-small btn-danger" tipo="' + item.idtipo_vehiculo + '"><i class="fa-solid fa-trash"></i></button>';
        objBotones += '</div>';
        dataSet.push([item.idtipo_vehiculo, item.nombre_tipo_vehiculo, objBotones]);
      }

      if (tablaTV != null) {
        $("#table_tipoVehiculo").dataTable().fnDestroy();
      }

      tablaTV = $("#table_tipoVehiculo").DataTable({
        data: dataSet
      });
    }
  }

  $("#table_tipoVehiculo").on("click", "#btnEditar", function () {
    var idtipo_vehiculo = $(this).attr('tipo');
    var nombre = $(this).attr('nombre');


    $("#edit-nombre").val(nombre);
    $("#btnEditarTipoVehiculo").attr("tipo", idtipo_vehiculo);

  })

  var formularioEditarTV = document.querySelectorAll('#formEditarTipoVehiculo');

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
          var idtipo_vehiculo = $("#btnEditarTipoVehiculo").attr("tipo");

          var objData = new FormData();
          objData.append("editNombre", nombre);
          objData.append("editId", idtipo_vehiculo);

          fetch('control/controlTipoVehiculo.php', {
            method: 'POST',
            body: objData
          }).then(response => response.json()).catch(error => {
            console.log(error);
          }).then(response => {
            alert(response["mensaje"]);
            $("#EditarTipoVehiculo").modal('toggle');
            listarTiposVehiculos();
          });

        }
      }, false)
    })

  $("#table_tipoVehiculo").on("click", "#btnEliminar", function () {
    var idtipo_vehiculo = $(this).attr('tipo');
    var objData = new FormData();
    objData.append("idEliminarTipo", idtipo_vehiculo);

    fetch('control/controlTipoVehiculo.php', {
      method: 'POST',
      body: objData
    }).then(response => response.json()).catch(error => {
      console.log(error);
    }).then(response => {
      alert(response["mensaje"]);
      listarTiposVehiculos();
    });
  })




})