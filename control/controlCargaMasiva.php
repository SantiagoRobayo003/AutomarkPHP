<?php
//incluimos modelo y la libreria que trabajara con el archivo
require_once "../vendor/autoload.php";
include_once "../modelo/modeloCargaMasivaInsumos.php";

class controlCargaMasiva {

    public $fileInsumos;

    public function ctrCargaMasiva(){
        $respuesta = modeloCargaMasivaInsumos::mdlCargarInsumos($this->fileInsumos);
        echo json_encode($respuesta);
    }
}
if (isset($_FILES)) {
    $CargaInsumos = new controlCargaMasiva();
    $CargaInsumos-> fileInsumos =$_FILES["fileCargar"];
    $CargaInsumos->ctrCargaMasiva();
}