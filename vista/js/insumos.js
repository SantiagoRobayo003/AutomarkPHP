$(function (){

    var tabla = null;
    listarInsumos();

    var formsinsumos = document.querySelectorAll('#forminsumos')

    Array.prototype.slice.call(formsinsumos)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')
          } else {
            event.preventDefault();
            let nombre = $("#nombre_insumo").val();
            let descripcion = $("#descripcion_insumo").val();
            let valor = $("#valor_insumo").val();
  
            let objInsumos = new FormData();
            objInsumos.append("nombre_insumo", nombre);
            objInsumos.append("descripcion_insumo", descripcion);
            objInsumos.append("valor_insumo", valor);
  
            fetch('control/insumosControl.php', {
              method: 'POST',
              body: objInsumos
            }).then(response => response.json()).catch(error => {
              console.error(error);
            }).then(response => {
              alert(response["mensaje"]);
              listarInsumos();
              $("#nombre_insumo").val("");
              $("#descripcion_insumo").val("");
              $("#valor_insumo").val("");
            });
          }
  
  
        }, false)
      })
  
    function listarInsumos() {
      var objData = new FormData();
      objData.append("listarInsumos", "ok");
      fetch('control/insumosControl.php', {
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
          objBotones += '<button id="btnEditar" type="button" class="btn btn-small btn-warning" insumo="' + item.idinsumos + '"nombre="' + item.nombre_insumo + '"descripcion="' + item.descripcion_insumo + '"valor="' + item.valor_insumo + '" data-bs-toggle="modal" data-bs-target="#EditarInsumo"><i class="fa-solid fa-pen-to-square"></i></button>';
          objBotones += '<button id="btnEliminar" type="button" class="btn btn-small btn-danger" insumo="' + item.idinsumos + '"><i class="fa-solid fa-trash"></i></button>';
          objBotones += '</div>';
          dataSet.push([item.nombre_insumo, item.descripcion_insumo, item.valor_insumo, objBotones]);
        }
  
        if (tabla != null) {
          $("#table_insumos").dataTable().fnDestroy();
        }
  
        tabla = $("#table_insumos").DataTable({
          data: dataSet
        });
      }
    }
  
    $("#table_insumos").on("click", "#btnEditar", function () {
      var idinsumo = $(this).attr('insumo');
      var nombres = $(this).attr('nombre');
      var descripcion = $(this).attr('descripcion');
      var valor = $(this).attr('valor');
  
  
      $("#edit-nombre").val(nombres);
      $("#edit-descripcion").val(descripcion);
      $("#edit-valor").val(valor);
      $("#btnEditarInsumo").attr("insumo", idinsumo);
  
    })
  
    var formularioEditar = document.querySelectorAll('#formEditarInsumos');
  
    // Bucle sobre ellos y evitar el envío
    Array.prototype.slice.call(formularioEditar)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')
          } else {
            event.preventDefault();
            var nombre = $("#edit-nombre").val();
            var descripcion = $("#edit-descripcion").val();
            var valor = $("#edit-valor").val();
            var idinsumo = $("#btnEditarInsumo").attr("insumo");
  
            var objData = new FormData();
            objData.append("editNombre", nombre);
            objData.append("editDescripcion", descripcion);
            objData.append("editValor", valor);
            objData.append("editId", idinsumo);
  
            fetch('control/insumosControl.php', {
              method: 'POST',
              body: objData
            }).then(response => response.json()).catch(error => {
              console.log(error);
            }).then(response => {
              alert(response["mensaje"]);
              $("#EditarInsumo").modal('toggle');
              listarInsumos();
            });
  
          }
        }, false)
      })
  
    $("#table_insumos").on("click", "#btnEliminar", function () {
      var idinsumo = $(this).attr('insumo');
      var objData = new FormData();
      objData.append("idEliminarUsuario", idinsumo);
  
      fetch('control/insumosControl.php', {
        method: 'POST',
        body: objData
      }).then(response => response.json()).catch(error => {
        console.log(error);
      }).then(response => {
        alert(response["mensaje"]);
        listarInsumos();
      });
    })

//-------------------------------------------------------------------------------------------------------------   

$("#forminsumos").on('click','#btn_agregarInsumo',function(){
        
  let codigo = $(this).attr("codigo")
  let descripcion = $(this).attr("descripcion")
  let valor = $(this).attr("valor")

  let itemFactura = '<tr class="hs-itemsFactura">';
  itemFactura += '<td scope="row"><button id="btn_eliminar" type="button" class="btn btn-danger btn-small"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
  itemFactura += '<td>'+codigo+'</td>';
  itemFactura += '<td>'+descripcion+'</td>';
  itemFactura += '<td><input name="" id="txt_cantidad" valorUnitario="'+valor+'" class="form-control" type="number" value="1"></td>';
  itemFactura += '<td id="td_valor">'+valor+'</td>';
  itemFactura += '</tr>';


  $("#contenedorInsumos").append(itemFactura);
  calcularTotal();    

                          
                          
      
})

$("#tablaFactura").on("click", "#btn_eliminar",function(){

  $(this).parent().parent().remove();
  calcularTotal();

})
$("#tablaFactura").on("change", "#txt_cantidad", function(){

  let cantidad = $(this).val();
  let valorUnitario = parseInt($(this).attr("valorUnitario"));
  let totalArticulo = cantidad * valorUnitario;

  $(this).parent().parent().children("#td_valor").html(totalArticulo);
  calcularTotal();
})

function calcularTotal(){
  let total = 0;

  $(".hs-itemsFactura").each(function(){

      total += parseInt($(this).children("#td_valor").text());

  });
  
  $("#totalisador").html("<h1>Total: "+total+"</h1>");
  
}

})