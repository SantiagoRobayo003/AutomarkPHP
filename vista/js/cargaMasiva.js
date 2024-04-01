//verificamos si se subio algun archivo
$($(document).ready(function () {
    $("#formCargaMasiva").on('submit', function (e) {
        e.preventDefault();

        if ($("#fileCargar").get(0).files.length == 0) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Debe seleccionar un archivo(Excel)',
                showConfirmButton: false,
                timer: 2500
            })
        } else {
            //limitamos a archivos de excel
            var extenciones_permitidas = [".xls", ".xlsx"];
            var input_file_productos = $("#fileCargar");
            var exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+(" + extenciones_permitidas.join("|") + ")$");
            //verificamos que el archvo subido es de tipo excel
            if (!exp_reg.test(input_file_productos.val().toLowerCase())) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Debe seleccionar un archivo(Excel)',
                    showConfirmButton: false,
                    timer: 2500
                })
                return false;
            }
            //enviamos el archivo
            var datos = new FormData($(formCargaMasiva)[0]);
            //desactivamos el boton y ativamos la imagen de carga
            $("#btnCargaMasiva").prop("disabled", true);
            $("#imgCargando").attr("style", "display:block");

            fetch('control/controlCargaMasiva.php', {
                method: 'POST',
                body: datos
            }).then(response => response.json()).catch(error => {
                console.error(error);
            }).then(response => {
                alert(response["mensaje"]);
                $("#btnCargaMasiva").prop("disabled", false);
                $("#imgCargando").attr("style", "display:none");
            });
        }







    })
}))
